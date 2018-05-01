<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnitTypesTable Test Case
 */
class UnitTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnitTypesTable
     */
    public $UnitTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unit_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UnitTypes') ? [] : ['className' => UnitTypesTable::class];
        $this->UnitTypes = TableRegistry::get('UnitTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UnitTypes);

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
