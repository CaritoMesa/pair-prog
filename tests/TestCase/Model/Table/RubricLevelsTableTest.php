<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RubricLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class RubricLevelsTableTest extends TestCase
{

    public $RubricLevels;

    public $fixtures = [
        'app.rubric_levels',
        'app.rubric_criterias',
        'app.rubrics',
        'app.users',
        'app.activities',
        'app.activities_groups',
        'app.submissions',
        'app.grades'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RubricLevels') ? [] : ['className' => 'App\Model\Table\RubricLevelsTable'];
        $this->RubricLevels = TableRegistry::get('RubricLevels', $config);
    }

    public function tearDown()
    {
        unset($this->RubricLevels);

        parent::tearDown();
    }

    public function testValidation()
    {
    	$postData = array(
    			'id' => 1,
            	'definition' => 'Resuelve solo 1 item del problema.',
            	'score' => 1.5,
            	'created' => '2016-11-09',
            	'modiefied' => '2016-11-09',
            	'rubric_criteria_id' => 1
    	);
    	$result = $this->RubricLevels->newEntity($postData);
    	$this->assertFalse(empty($result));
    	$this->assertTrue(is_integer($postData['id']));
    	$this->assertFalse(is_null($postData['definition']));
    	$this->assertFalse(is_null($postData['score']));
    }

    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
