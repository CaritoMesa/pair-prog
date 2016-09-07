<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivitiesGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivitiesGroupsTable Test Case
 */
class ActivitiesGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivitiesGroupsTable
     */
    public $ActivitiesGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activities_groups',
        'app.activities',
        'app.users',
        'app.submissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActivitiesGroups') ? [] : ['className' => 'App\Model\Table\ActivitiesGroupsTable'];
        $this->ActivitiesGroups = TableRegistry::get('ActivitiesGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActivitiesGroups);

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
}
