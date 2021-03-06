<?php
use Migrations\AbstractMigration;

class CreateTrades extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('trades',['id' => false]);
        $table->addColumn('TradeID', 'integer',
                    [
                        'autoIncrement' => true,
                        'limit' => 10,
                    ])
            ->addPrimaryKey(['TradeID']);
        $table->addColumn('TradeTypeID', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('TradeName', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
