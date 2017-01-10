<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivitiesTable Test Case
 */
class ActivitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivitiesTable
     */
    public $Activities;
    
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activities',
        'app.users',
        'app.activities_groups',
        'app.rubrics',
        'app.rubric_criterias',
        'app.rubric_levels',
        'app.assignments',
        'app.groups',
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
        $config = TableRegistry::exists('Activities') ? [] : ['className' => 'App\Model\Table\ActivitiesTable'];
        $this->Activities = TableRegistry::get('Activities', $config);
    }

    /**
     * testValidationActivity method
     *
     * @return void
     */
    public function testValidationActivity() 
    {
        $postData = array(
            'id' => 1,
            'name' => 'Actividad 01',
            'description' => 'Definir una función max() que tome como argumento dos números y devuelva el mayor de ellos. (Es cierto que python tiene una función max() incorporada, pero hacerla nosotros mismos es un muy buen ejercicio.',
            'created' => '2016-12-11 01:57:38',
            'modified' => '2016-12-11 01:57:38',
            'user_id' => 1,
            'activities_group_id' => 1,
            'rubric_id' => 1
      );
      $result = $this->Activities->newEntity($postData);  
      $this->assertFalse(empty($result));
      $this->assertTrue(is_integer($postData['id']));
      $this->assertFalse(is_null($postData['name']));
      $this->assertFalse(is_null($postData['description']));
      $this->assertFalse(is_null($postData['user_id']));
      $this->assertFalse(is_null($postData['activities_group_id']));
    }
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
