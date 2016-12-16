<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeersTable Test Case
 */
class PeersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeersTable
     */
    public $Peers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.peers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Peers') ? [] : ['className' => 'App\Model\Table\PeersTable'];
        $this->Peers = TableRegistry::get('Peers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Peers);

        parent::tearDown();
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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
