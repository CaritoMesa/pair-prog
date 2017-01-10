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
        'app.activities_groups'/*,
        'app.activities',
        'app.users',
        'app.submissions'*/
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
    	$postData = array(
    			'id' => 1,
	            'name' => 'Actividades de Funciones',
	            'created' => '2016-09-07',
	            'modified' => '2016-09-07'
    	);
    	$result = $this->ActivitiesGroups->newEntity($postData);
    	$this->assertFalse(empty($result));
    	$this->assertTrue(is_integer($postData['id']));
    	$this->assertFalse(is_null($postData['name']));
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
