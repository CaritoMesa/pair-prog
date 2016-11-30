<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class ActivitiesTableTest extends TestCase
{

    public $Activities;

    public $fixtures = [
        'app.activities',
        'app.users',
        'app.activities_groups',
        'app.rubrics',
        'app.grades',
        'app.submissions'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Activities') ? [] : ['className' => 'App\Model\Table\ActivitiesTable'];
        $this->Activities = TableRegistry::get('Activities', $config);
    }

    public function tearDown()
    {
        unset($this->Activities);

        parent::tearDown();
    }

    public function testValidation() 
    {
        $postData = array(
            'id' => 1,
            'name' => 'Actividad 1',
            'description' => 'Esta es la Actividad 1.',
            'created' => '2016-09-09 13:52:42',
            'modified' => '2016-09-09 13:52:42',
            'user_id' => 1,
            'activities_group_id' => 1,
            'rubric_id' => 1
	      );
	      $result = $this->Activities->newEntity($postData);  
	      $this->assertFalse(empty($result));
	      $this->assertTrue(is_integer($postData['id']));
	      $this->assertFalse(is_null($postData['name']));
	      $this->assertFalse(is_null($postData['description']));
	      $this->Users = TableRegistry::get('Users');
	      $this->assertFalse(is_null($this->Users->get($postData['user_id'])));
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
    	$result = $this->Activities->get(1);
    	
    	$this->Users = TableRegistry::get('Users');
    	$this->assertFalse(is_null($this->Users->get($result->user_id)));
    	
    	$this->ActivitiesGroups = TableRegistry::get('ActivitiesGroups');
    	$this->assertFalse(is_null($this->ActivitiesGroups->get($result->activities_group_id)));
    	
    	$this->Rubrics = TableRegistry::get('Rubrics');
    	$this->assertFalse(is_null($this->Rubrics->get($result->rubric_id)));
    }
}
