<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    protected $output;
    protected $error;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
    }

    /**
     * @Given /^I am in the root directory$/
     */
    public function iAmInTheRootDirectory()
    {
        chdir(__DIR__ . "/../../");
    }

    /**
     * @When /^I run the console command "([^"]*)"$/
     */
    public function iRunTheConsoleCommand($arg1)
    {
        $command = "php -f app {$arg1} 2>&1";
        exec($command, $output, $error);
        $this->error = $error;
        $this->output = trim(implode(PHP_EOL, $output));
    }

    /**
     * @Then /^I should get:$/
     */
    public function iShouldGet(PyStringNode $string)
    {
        if ((string)$string !== $this->output) {
            throw new Exception(
                "Actual output is:\n" . $this->output
            );
        }
    }

    /**
     * @Given /^an error code is set$/
     */
    public function anErrorCodeIsSet()
    {
        if (empty($this->error)) {
            throw new Exception("Error code was not set");
        }
    }
}
