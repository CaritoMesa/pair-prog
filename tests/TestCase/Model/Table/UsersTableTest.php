<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class UsersTableTest extends TestCase
{

    public $Users;

    public $fixtures = [
        'app.users'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    public function tearDown()
    {
        unset($this->Users);
        parent::tearDown();
    }
    
    public function testValidationRegistroWeb() 
    {
        $postData = array(
            'id' => 1, 
            'first_name' => 'Javier',
            'last_name' => 'Gonzalez',
            'email' => 'jgonzalez@lti.cl',
            'username' => 'jgonzalez',
            'password' => 'jgonzalez',
            'created' => '2016-09-07 02:17:43',
            'modified' => '2016-09-07 02:17:43'
      );
      $result = $this->Users->newEntity($postData);  
      $this->assertFalse(empty($result));
      $this->assertTrue(is_integer($postData['id']));
      $this->assertFalse(is_null($postData['first_name']));
      $this->assertFalse(is_null($postData['last_name']));
      $this->assertFalse(is_null($postData['username']));
      $this->assertFalse(is_null($postData['password']));
    }

}
