<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use FOS\UserBundle\Model\UserManagerInterface;

/**
 * Defines application features from the specific context.
 */
class AuthenticationContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
    /**
     * @var UserManagerInterface
     */
    private $userManager;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @When /^I "([^"]*)" register with "([^"]*)" email and "([^"]*)" password$/
     */
    public function iRegisterWithEmailAndPassword($name, $email, $password)
    {
        $this->visitPath('/register');

        $nameField = $this->assertSession()->elementExists('css', '#fos_user_registration_form_name');
        $nameField->setValue($name);

        $emailField = $this->assertSession()->elementExists('css', '#fos_user_registration_form_email');
        $emailField->setValue($email);

        $passwordField = $this->assertSession()->elementExists('css', '#fos_user_registration_form_plainPassword');
        $passwordField->setValue($password);

        $submitButton = $this->assertSession()
            ->elementExists('css', 'form[name="fos_user_registration_form"] [type="submit"]');
        $submitButton->press();
    }

    /**
     * @Then /^I should be notified that I successfully registered an account$/
     */
    public function iShouldBeNotifiedThatISuccessfullyRegisteredAnAccount()
    {
        $this->assertSession()->addressEquals('/register/confirmed');

        $this->assertSession()->pageTextContains('Your registration is successful!');
    }

    /**
     * @Given /^I should have an option to log out$/
     */
    public function iShouldHaveAnOptionToLogOut()
    {
        $this->assertSession()->elementExists('named', ['link', 'Log out']);
    }

    /**
     * This can be moved to the user context, as user creation / making sure
     * a user exists is not a part of authentication/registration.
     *
     * @Given /^there is a customer named "([^"]*)" with email "([^"]*)" and "([^"]*)" password$/
     */
    public function thereIsACustomerNamedWithEmailAndPassword($name, $email, $password)
    {
        $user = $this->userManager->createUser();

        $user->setEnabled(true);
        $user->setName($name);
        $user->setEmail($email);
        $user->setPlainPassword($password);

        $this->userManager->updateUser($user);
    }

    /**
     * @Then /^I should be notified that email is taken$/
     */
    public function iShouldBeNotifiedThatEmailIsTaken()
    {
        $this->assertSession()->addressEquals('/register/');

        $this->assertSession()->pageTextContains('The email is already used');
    }

    /**
     * @When /^I login with "([^"]*)" email and "([^"]*)" password$/
     */
    public function iLoginWithEmailAndPassword($email, $password)
    {
        $this->visitPath('/login');

        $emailField = $this->assertSession()->elementExists('css', '#username');
        $emailField->setValue($email);

        $passwordField = $this->assertSession()->elementExists('css', '#password');
        $passwordField->setValue($password);

        $submitButton = $this->assertSession()->elementExists('css', '#_submit');
        $submitButton->press();
    }

    /**
     * @Then /^I should be notified that credentials are invalid$/
     */
    public function iShouldBeNotifiedThatCredentialsAreInvalid()
    {
        $this->assertSession()->addressEquals('/login');

        $this->assertSession()->pageTextContains('Invalid credentials');
    }
}
