<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    
    /**
     * @Given I go to :arg1
     */
    public function iGoTo($arg1)
    {
    	throw new PendingException();
    }
    
    /**
     * @When I fill in :arg1 with :arg2
     */
    public function iFillInWith($arg1, $arg2)
    {
    	throw new PendingException();
    }
    
    /**
     * @When I press :arg1
     */
    public function iPress($arg1)
    {
    	throw new PendingException();
    }
    
    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
    	throw new PendingException();
    }
    
}
