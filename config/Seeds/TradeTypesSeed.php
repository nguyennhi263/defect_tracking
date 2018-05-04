<?php
use Migrations\AbstractSeed;

/**
 * TradeTypes seed.
 */
class TradeTypesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['TradeTypeName'=>'Architect'],
            ['TradeTypeName'=>'M&E Consultant'],
            ['TradeTypeName'=>'Structural Consultant']
        ];

        $table = $this->table('trade_types');
        $table->insert($data)->save();
    }
}
