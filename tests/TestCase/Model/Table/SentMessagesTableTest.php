<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SentMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SentMessagesTable Test Case
 */
class SentMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SentMessagesTable
     */
    public $SentMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sent_messages',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SentMessages') ? [] : ['className' => SentMessagesTable::class];
        $this->SentMessages = TableRegistry::getTableLocator()->get('SentMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SentMessages);

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
