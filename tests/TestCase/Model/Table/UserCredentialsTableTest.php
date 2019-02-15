<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserCredentialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserCredentialsTable Test Case
 */
class UserCredentialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserCredentialsTable
     */
    public $UserCredentials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserCredentials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserCredentials') ? [] : ['className' => UserCredentialsTable::class];
        $this->UserCredentials = TableRegistry::getTableLocator()->get('UserCredentials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserCredentials);

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
