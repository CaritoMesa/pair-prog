<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RubricCriteriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RubricCriteriasTable Test Case
 */
class RubricCriteriasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RubricCriteriasTable
     */
    public $RubricCriterias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rubric_criterias',
        'app.rubrics',
        'app.users',
        'app.activities',
        'app.activities_groups',
        'app.submissions',
        'app.grades',
        'app.rubrics_items',
        'app.rubric_levels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RubricCriterias') ? [] : ['className' => 'App\Model\Table\RubricCriteriasTable'];
        $this->RubricCriterias = TableRegistry::get('RubricCriterias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RubricCriterias);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
