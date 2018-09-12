<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubscriptionPackagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubscriptionPackagesTable Test Case
 */
class SubscriptionPackagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubscriptionPackagesTable
     */
    public $SubscriptionPackages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subscription_packages',
        'app.subscriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SubscriptionPackages') ? [] : ['className' => SubscriptionPackagesTable::class];
        $this->SubscriptionPackages = TableRegistry::getTableLocator()->get('SubscriptionPackages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubscriptionPackages);

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
