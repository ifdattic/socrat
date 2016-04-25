@database
Feature: Authentication
  In order to get access to questions
  As a visitor
  I need to be able to login and logout

  Scenario: Authenticating with credentials of existing customer
    Given there is a customer named "Hal" with email "gwunsch@example.com" and "hal" password
    When I login with "gwunsch@example.com" email and "hal" password
    Then I should have an option to log out

  Scenario Outline: Authenticating with invalid credentials
    Given there is a customer named "Hal" with email "gwunsch@example.com" and "hal" password
    When I login with "<email>" email and "<password>" password
    Then I should be notified that credentials are invalid

    Examples:
      | email               | password | rule                                              |
      | gwunsch@example.com | dale     | correct email but bad password                    |
      | uconroy@example.org | hal      | correct password bu bad email (not really needed) |
      | uconroy@example.org | dale     | non-existing customer credentials                 |

#  Scenario: Not being able to authenticate again if I'm already authenticated
