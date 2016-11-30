<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    public $fixtures = ['app.users'];

    public function testTrue ()
    {
        $this->assertTrue(true);
    }
    
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');

        $this->assertResponseOk();

    }
    
    /*public function testIndexQueryData()
    {
        $this->get('/users?page=1');

        $this->assertResponseOk();
    }

    public function testIndexShort()
    {
        $this->get('/users/index/short');

        $this->assertResponseOk();
        $this->assertResponseContains('Users');
    }

    public function testIndexPostData()
    {
        $data = [
            'id' => 1,
            'first_name' => 'Javier',
            'last_name' => 'Gonzalez',
            'lti_user_id' => 1,
            'email' => 'jgonzalez@lti.cl',
            'username' => 'jgonzalez',
            'password' => 'jgonzalez',
            'created' => '2016-09-07 02:17:43',
            'modified' => '2016-09-07 02:17:43'
        ];
        $this->post('/users', $data);

        $this->assertResponseSuccess();
        $articles = TableRegistry::get('Users');
        $query = $articles->find()->where(['id' => $data['id']]);
        $this->assertEquals(1, $query->count());
    }
    public function testAddUnauthenticatedFails()
    {
        // No session data set.
        $this->get('/articles/add');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function testAddAuthenticated()
    {
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1
                ]
            ]
        ]);
        $this->get('/articles/add');

        $this->assertResponseOk();
    }
    public function testBasicAuthentication()
    {
        $this->configRequest([
            'environment' => [
                'PHP_AUTH_USER' => 'username',
                'PHP_AUTH_PW' => 'password',
            ]
        ]);

        $this->get('/api/posts');
        $this->assertResponseOk();
    }
    public function testOauthToken()
    {
        $this->configRequest([
            'headers' => [
                'authorization' => 'Bearer: oauth-token'
            ]
        ]);

    $this->get('/api/posts');
    $this->assertResponseOk();
    }
    public function testIndexNotAuthorized()
    {
        $this->get('/admin/dashboard');
        $this->assertResponseSuccess();
        $this->assertRedirect('/admin');
    }

    public function testIndexx()
    {
        $this->session([
            'Auth' => [
                'CakeAdmin' => [
                    'id' => 1,
                    'email' => 'bob@cakeplugins.org',
                    'cakeadmin' => 1
                ]
            ]
        ]);
        $this->get('/admin/dashboard');
        $this->assertResponseSuccess();
        $this->assertNoRedirect();
        $this->assertLayout('default');
        $this->assertLayout('lightstrap');
        $this->assertTemplate('index');
        $this->assertTemplate('lightstrap');
        $this->assertResponseContains('<li class="active"><a href="/admin/dashboard">Dashboard</a></li>');
    }*/

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
        /*$this->get('/users?page=1');

        $this->assertResponseOk();*/
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
        /*$this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/users/add', ['id' => 4]);

        /*$data = [
            'id' => 4,
            'first_name' => 'Martin',
            'last_name' => 'Nuñez',
            'email' => 'mnunez@lti.cl',
            'username' => 'mnunez',
            'password' => 'mnunez',
            'created' => '2016-09-07 02:17:43',
            'modified' => '2016-09-07 02:17:43'
        ];
        $this->post('/users', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['id' => $data['id']]);
        $this->assertEquals(1, $query->count());*/
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
        /*$data = [
            'id' => 1,
            'password' => '123456',
        ];
        $this->put('/users', $data);

        $this->assertResponseSuccess();
        $users = TableRegistry::get('Users');
        $query = $users->find()->where(['id' => $data['id']]);
        $this->assertEquals(1, $query->count());*/
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
        /*$this->delete('/users?page=1');

        $this->assertResponseOk();*/
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLogin()
    {
        $this->markTestIncomplete('Not implemented yet.');
        /*$this->configRequest([
        'environment' => [
            'PHP_AUTH_USER' => 'username',
            'PHP_AUTH_PW' => 'password',
        ]
    ]);

    $this->get('/api/posts');
    $this->assertResponseOk();*/
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

}
