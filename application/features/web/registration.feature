@database
Feature: Registration
  In order to get access to questions
  As a visitor
  I need to be able to register for a new account

  Scenario: Registering a new account
    When I "Dale" register with "uconroy@example.org" email and "dale" password
    Then I should be notified that I successfully registered an account
    And I should have an option to log out

  Scenario: Registering with an email which is already used
    Given there is a customer named "Hal" with email "gwunsch@example.com" and "hal" password
    When I "Dale" register with "gwunsch@example.com" email and "dale" password
    Then I should be notified that email is taken
