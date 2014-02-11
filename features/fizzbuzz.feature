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
Scenario: fizzbuzz with a backwards range
    Given I am in the root directory
    When I run the console command "fizzbuzz 2 1"
    Then I should get:
        """
        Ending cannot be before beginning.
        """
    And an error code is set
Scenario: fizzbuzz with a range including negatives
    Given I am in the root directory
    When I run the console command "fizzbuzz -- -2 2"
    Then I should get:
        """
        -2
        -1
        0
        1
        2
        """
Scenario: fizzbuzz with a fizz and a buzz
    Given I am in the root directory
    When I run the console command "fizzbuzz 1 5"
    Then I should get:
        """
        1
        2
        fizz
        4
        buzz
        """
Scenario: fizzbuzz with a fizz, a buzz, and a fizzbuzz
    Given I am in the root directory
    When I run the console command "fizzbuzz 1 15"
    Then I should get:
        """
        1
        2
        fizz
        4
        buzz
        fizz
        7
        8
        fizz
        buzz
        11
        fizz
        13
        14
        fizzbuzz
        """
Scenario: fizzbuzz with a range not starting at 1
    Given I am in the root directory
    When I run the console command "fizzbuzz 10 12"
    Then I should get:
        """
        buzz
        11
        fizz
        """
