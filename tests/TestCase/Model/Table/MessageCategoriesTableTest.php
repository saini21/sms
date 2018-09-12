<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageCategoriesTable Test Case
 */
class MessageCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageCategoriesTable
     */
    public $MessageCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.message_categories',
        'app.messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MessageCategories') ? [] : ['className' => MessageCategoriesTable::class];
        $this->MessageCategories = TableRegistry::getTableLocator()->get('MessageCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageCategories);

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
