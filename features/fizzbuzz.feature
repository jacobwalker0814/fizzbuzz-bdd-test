Feature: fizzbuzz
    When I invoke the fizzbuzz method of my app with a range
    I should see numbers, fizz, buzz, or fizzbuzz
Scenario: fizzbuzz with a simple range
    Given I am in the root directory
    When I run the console command "fizzbuzz 1 2"
    Then I should get:
        """
        1
        2
        """
