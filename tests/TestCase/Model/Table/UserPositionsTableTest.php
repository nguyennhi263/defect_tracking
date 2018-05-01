<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserPositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserPositionsTable Test Case
 */
class UserPositionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserPositionsTable
     */
    public $UserPositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_positions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserPositions') ? [] : ['className' => UserPositionsTable::class];
        $this->UserPositions = TableRegistry::get('UserPositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserPositions);

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
