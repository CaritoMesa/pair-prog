<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolesTable Test Case
 */
class RolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesTable
     */
    public $Roles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles'/*,
        'app.assignments',
        'app.users',
        'app.groups',
        'app.activities',
        'app.activities_groups',
        'app.rubrics',
        'app.rubric_criterias',
        'app.rubric_levels',
        'app.submissions'*/
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Roles') ? [] : ['className' => 'App\Model\Table\RolesTable'];
        $this->Roles = TableRegistry::get('Roles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Roles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
    	$postData = array(
    			'id' => 1,
            'name' => 'Ejecutor'
    	);
    	$result = $this->Assignments->newEntity($postData);
    	$this->assertFalse(empty($result));
    	$this->assertTrue(is_integer($postData['id']));
    	$this->assertFalse(is_null($postData['name']));
    }

}
