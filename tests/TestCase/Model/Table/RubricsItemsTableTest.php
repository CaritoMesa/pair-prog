<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RubricsItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RubricsItemsTable Test Case
 */
class RubricsItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RubricsItemsTable
     */
    public $RubricsItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rubrics_items',
        'app.rubrics',
        'app.activities',
        'app.users',
        'app.activities_groups',
        'app.submissions',
        'app.grades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RubricsItems') ? [] : ['className' => 'App\Model\Table\RubricsItemsTable'];
        $this->RubricsItems = TableRegistry::get('RubricsItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RubricsItems);

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
