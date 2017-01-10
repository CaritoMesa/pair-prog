<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AssignmentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AssignmentsController Test Case
 */
class AssignmentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignments',
        'app.users',
        'app.groups',
        'app.activities',
        'app.activities_groups',
        'app.rubrics',
        'app.rubric_criterias',
        'app.rubric_levels',
        'app.submissions'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
    	$this->get('/assignments');
    	 
    	$this->assertResponseOk();
    }
    
    public function testIndexQueryData()
    {
    	$this->get('/assignments?page=1');
    
    	$this->assertResponseOk();
    }
    
    public function testIndexPostData()
    {
    	$data = [
    			'id' => 1,
	            'created' => '2016-12-16',
	            'modified' => '2016-12-16',
	            'user_id' => 1,
	            'group_id' => 1,
	            'role_id' => 1
    	];
    	$this->post('/assignments', $data);
    
    	$this->assertResponseSuccess();
    	$articles = TableRegistry::get('Assignments');
    	$query = $articles->find()->where(['id' => $data['id']]);
    	$this->assertEquals(1, $query->count());
    }
    
    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
