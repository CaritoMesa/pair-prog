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
        'app.submissions',
        'app.grades'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
