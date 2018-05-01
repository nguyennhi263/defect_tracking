<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TradeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TradeTypesTable Test Case
 */
class TradeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TradeTypesTable
     */
    public $TradeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trade_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TradeTypes') ? [] : ['className' => TradeTypesTable::class];
        $this->TradeTypes = TableRegistry::get('TradeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TradeTypes);

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
