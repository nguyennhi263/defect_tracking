<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefectHeadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefectHeadersTable Test Case
 */
class DefectHeadersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DefectHeadersTable
     */
    public $DefectHeaders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.defect_headers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DefectHeaders') ? [] : ['className' => DefectHeadersTable::class];
        $this->DefectHeaders = TableRegistry::get('DefectHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DefectHeaders);

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
