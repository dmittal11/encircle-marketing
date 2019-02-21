<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserTimesheetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserTimesheetsTable Test Case
 */
class UserTimesheetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserTimesheetsTable
     */
    public $UserTimesheets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserTimesheets',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserTimesheets') ? [] : ['className' => UserTimesheetsTable::class];
        $this->UserTimesheets = TableRegistry::getTableLocator()->get('UserTimesheets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserTimesheets);

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
