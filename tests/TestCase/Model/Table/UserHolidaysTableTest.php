<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserHolidaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserHolidaysTable Test Case
 */
class UserHolidaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserHolidaysTable
     */
    public $UserHolidays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserHolidays',
        'app.Logins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserHolidays') ? [] : ['className' => UserHolidaysTable::class];
        $this->UserHolidays = TableRegistry::getTableLocator()->get('UserHolidays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserHolidays);

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
