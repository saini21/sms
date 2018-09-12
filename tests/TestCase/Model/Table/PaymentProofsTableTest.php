<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentProofsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentProofsTable Test Case
 */
class PaymentProofsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentProofsTable
     */
    public $PaymentProofs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payment_proofs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PaymentProofs') ? [] : ['className' => PaymentProofsTable::class];
        $this->PaymentProofs = TableRegistry::getTableLocator()->get('PaymentProofs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PaymentProofs);

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
