<?php
use Migrations\AbstractMigration;

class CreateDefectItems extends AbstractMigration
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
        $table = $this->table('defect_items',['id' => false]);
        $table->addColumn('DefectItemID', 'integer',
                    [
                        'autoIncrement' => true,
                        'limit' => 10,
                    ])
            ->addPrimaryKey(['DefectItemID']);
        $table->addColumn('DefectID', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('TradeDescriptionID', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('ImageFileNameBefore', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('ImageFileNameAfter', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('PlaceID', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('CloseDate', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('DefectStatus', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('Note', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
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
