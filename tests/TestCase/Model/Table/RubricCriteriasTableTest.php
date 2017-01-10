<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RubricCriteriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class RubricCriteriasTableTest extends TestCase
{

    public $RubricCriterias;

    public $fixtures = [
        'app.rubric_criterias'/*,
        'app.rubrics',
        'app.users',
        'app.activities',
        'app.activities_groups',
        'app.submissions',
        'app.grades',
        'app.rubric_levels'*/
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RubricCriterias') ? [] : ['className' => 'App\Model\Table\RubricCriteriasTable'];
        $this->RubricCriterias = TableRegistry::get('RubricCriterias', $config);
    }

    public function tearDown()
    {
        unset($this->RubricCriterias);

        parent::tearDown();
    }

    public function testValidation()
    {
    	$postData = array(
    			'id' => 1,
	            'description' => 'Resuelve problema propuesto.',
	            'rubric_id' => 1
    	);
    	$result = $this->RubricCriterias->newEntity($postData);
    	$this->assertFalse(empty($result));
    	$this->assertTrue(is_integer($postData['id']));
    	$this->assertFalse(is_null($postData['description']));
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
