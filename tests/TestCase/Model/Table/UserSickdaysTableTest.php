<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserSickdaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserSickdaysTable Test Case
 */
class UserSickdaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserSickdaysTable
     */
    public $UserSickdays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserSickdays',
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
        $config = TableRegistry::getTableLocator()->exists('UserSickdays') ? [] : ['className' => UserSickdaysTable::class];
        $this->UserSickdays = TableRegistry::getTableLocator()->get('UserSickdays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserSickdays);

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
