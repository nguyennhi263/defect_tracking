<?php
use Migrations\AbstractSeed;

/**
 * Trades seed.
 */
class TradesSeed extends AbstractSeed
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
        $data = [['TradeName'=>'RC Beam'],['TradeName'=>'Plumbing - Pressure test']];

        $table = $this->table('trades');
        $table->insert($data)->save();
    }
}
