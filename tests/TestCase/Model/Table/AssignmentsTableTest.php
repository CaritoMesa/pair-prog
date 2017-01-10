<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignmentsTable Test Case
 */
class AssignmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignmentsTable
     */
    public $Assignments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignments'/*,
        'app.users',
        'app.groups',
        'app.activities',
        'app.activities_groups',
        'app.rubrics',
        'app.rubric_criterias',
        'app.rubric_levels',
        'app.submissions',
        'app.grades'*/
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Assignments') ? [] : ['className' => 'App\Model\Table\AssignmentsTable'];
        $this->Assignments = TableRegistry::get('Assignments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assignments);

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
	            'created' => '2016-12-16',
	            'modified' => '2016-12-16',
	            'user_id' => 1,
	            'group_id' => 1,
	            'role_id' => 1
    	);
    	$result = $this->Assignments->newEntity($postData);
    	$this->assertFalse(empty($result));
    	$this->assertTrue(is_integer($postData['id']));
    	$this->assertFalse(is_null($postData['user_id']));
    	$this->assertFalse(is_null($postData['group_id']));
    	$this->assertFalse(is_null($postData['role_id']));
    }

}
