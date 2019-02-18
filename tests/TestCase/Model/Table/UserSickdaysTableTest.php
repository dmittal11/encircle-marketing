<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersickdaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersickdaysTable Test Case
 */
class UsersickdaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersickdaysTable
     */
    public $Usersickdays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Usersickdays',
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
        $config = TableRegistry::getTableLocator()->exists('Usersickdays') ? [] : ['className' => UsersickdaysTable::class];
        $this->Usersickdays = TableRegistry::getTableLocator()->get('Usersickdays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Usersickdays);

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
