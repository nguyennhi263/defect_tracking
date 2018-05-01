<?php
use Migrations\AbstractMigration;

class CreateTradeTypes extends AbstractMigration
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
        $table = $this->table('trade_types',['id' => false]);
        $table->addColumn('TradeTypeID', 'integer',
                    [
                        'autoIncrement' => true,
                        'limit' => 10,
                    ])
            ->addPrimaryKey(['TradeTypeID']);
        $table->addColumn('TradeTypeName', 'string', [
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
 