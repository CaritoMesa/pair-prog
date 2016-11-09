<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RubricLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RubricLevelsTable Test Case
 */
class RubricLevelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RubricLevelsTable
     */
    public $RubricLevels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rubric_levels',
        'app.rubric_criterias',
        'app.rubrics',
        'app.users',
        'app.activities',
        'app.activities_groups',
        'app.submissions',
        'app.grades',
        'app.rubrics_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RubricLevels') ? [] : ['className' => 'App\Model\Table\RubricLevelsTable'];
        $this->RubricLevels = TableRegistry::get('RubricLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RubricLevels);

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
