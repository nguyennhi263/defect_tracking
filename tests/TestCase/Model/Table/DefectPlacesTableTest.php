<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefectPlacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefectPlacesTable Test Case
 */
class DefectPlacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DefectPlacesTable
     */
    public $DefectPlaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.defect_places',
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
        $config = TableRegistry::exists('DefectPlaces') ? [] : ['className' => DefectPlacesTable::class];
        $this->DefectPlaces = TableRegistry::get('DefectPlaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DefectPlaces);

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
