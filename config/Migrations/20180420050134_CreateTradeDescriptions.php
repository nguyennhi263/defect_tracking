<?php
use Migrations\AbstractMigration;

class CreateTradeDescriptions extends AbstractMigration
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
        $table = $this->table('trade_descriptions',['id' => false]);
        $table->addColumn('TradeDescriptionID', 'integer',
                    [
                        'autoIncrement' => true,
                        'limit' => 10,
                    ])
            ->addPrimaryKey(['TradeDescriptionID']);
        $table->addColumn('TradeID', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('TradeDescriptionDetail', 'string', [
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
