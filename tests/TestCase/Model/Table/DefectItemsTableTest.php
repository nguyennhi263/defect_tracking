<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefectItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefectItemsTable Test Case
 */
class DefectItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DefectItemsTable
     */
    public $DefectItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.defect_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DefectItems') ? [] : ['className' => DefectItemsTable::class];
        $this->DefectItems = TableRegistry::get('DefectItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DefectItems);

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
