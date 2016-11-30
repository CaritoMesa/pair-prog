<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RubricsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class RubricsTableTest extends TestCase
{

    public $Rubrics;

    public $fixtures = [
        'app.rubrics',
        'app.users',
        'app.activities',
        'app.activities_groups',
        'app.submissions',
        'app.grades',
        'app.rubric_criterias',
        'app.rubric_levels'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rubrics') ? [] : ['className' => 'App\Model\Table\RubricsTable'];
        $this->Rubrics = TableRegistry::get('Rubrics', $config);
    }

    public function tearDown()
    {
        unset($this->Rubrics);

        parent::tearDown();
    }

    public function testValidationOk() 
    {
        $postData = array(
            'id' => 1,
            'name' => 'Rubrica 1',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2016-11-09',
            'modified' => '2016-11-09',
            'user_id' => 1
      );
      $result = $this->Rubrics->newEntity($postData);  
      $this->assertFalse(empty($result));
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
