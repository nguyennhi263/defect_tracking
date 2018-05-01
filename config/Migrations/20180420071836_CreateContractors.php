<?php
use Migrations\AbstractMigration;

class CreateContractors extends AbstractMigration
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
        $table = $this->table('contractors',['id' => false]);
        $table->addColumn('ContractorID', 'integer',
                    [
                        'autoIncrement' => true,
                        'limit' => 10,
                    ])
            ->addPrimaryKey(['ContractorID']);
        $table->addColumn('ContractorName', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
