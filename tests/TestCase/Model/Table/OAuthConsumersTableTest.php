<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OAuthConsumersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class OAuthConsumersTableTest extends TestCase
{
    public $OAuthConsumers;

    public $fixtures = [
        'app.o_auth_consumers'
    ];

    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OAuthConsumers') ? [] : ['className' => 'App\Model\Table\OAuthConsumersTable'];
        $this->OAuthConsumers = TableRegistry::get('OAuthConsumers', $config);
    }

    public function tearDown()
    {
        unset($this->OAuthConsumers);
        parent::tearDown();
    }

    public function testValidation() 
    {
      $postData = array(
            'id' => 1, 
            'key' => 'llave',
            'secret' => 'secreto'
      );
      $result = $this->OAuthConsumers->newEntity($postData);  
      $this->assertFalse(empty($result));
      $this->assertTrue(is_integer($postData['id']));
      $this->assertFalse(is_null($postData['key']));
      $this->assertFalse(is_null($postData['secret']));
    }

}
