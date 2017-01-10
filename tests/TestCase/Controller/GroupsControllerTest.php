<?php
namespace App\Test\TestCase\Controller;

use App\Controller\GroupsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\GroupsController Test Case
 */
class GroupsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.groups',
        'app.activities',
        'app.users',
        'app.activities_groups',
        'app.rubrics',
        'app.rubric_criterias',
        'app.rubric_levels',
        'app.submissions',
        'app.assignments'
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
            'name' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-12-11',
            'modified' => '2016-12-11',
            'activity_id' => 1
    	];
    	$this->post('/groups', $data);
    
    	$this->assertResponseSuccess();
    	$articles = TableRegistry::get('Groups');
    	$query = $articles->find()->where(['id' => $data['id']]);
    	$this->assertEquals(1, $query->count());
    }
}
