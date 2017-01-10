<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubmissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class SubmissionsTableTest extends TestCase
{

    public $Submissions;

    public $fixtures = [
        'app.submissions',
        'app.activities',
        'app.users',
        'app.activities_groups',
        'app.rubrics'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Submissions') ? [] : ['className' => 'App\Model\Table\SubmissionsTable'];
        $this->Submissions = TableRegistry::get('Submissions', $config);
    }

    public function tearDown()
    {
        unset($this->Submissions);

        parent::tearDown();
    }

    public function testValidationOk() 
    {
        $postData = array(
            'id' => 1,
            'submission' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2016-09-27 00:54:11',
            'modified' => '2016-09-27 00:54:11',
            'user_id' => 1,
            'activity_id' => 1
      );
      $result = $this->Submissions->newEntity($postData);  
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
