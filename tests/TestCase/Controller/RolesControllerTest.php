<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RolesController Test Case
 */
class RolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles',
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
    	$this->get('/groups');
    	 
    	$this->assertResponseOk();
    }
    
    public function testIndexQueryData()
    {
    	$this->get('/groups?page=1');
    
    	$this->assertResponseOk();
    }
    
    public function testIndexPostData()
    {
    	$data = [
    			'id' => 1,
            	'name' => 'Ejecutor'
    	];
    	$this->post('/groups', $data);
    
    	$this->assertResponseSuccess();
    	$articles = TableRegistry::get('Groups');
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
