<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contractors Model
 *
 * @method \App\Model\Entity\Contractor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contractor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contractor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contractor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contractor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contractor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contractor findOrCreate($search, callable $callback = null, $options = [])
 */
class ContractorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contractors');
        $this->setDisplayField('ContractorName');
        $this->setPrimaryKey('ContractorID');
        $this->hasMany('Blocks', [
            'foreignKey' => 'ContractorID'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('ContractorID')
            ->allowEmpty('ContractorID', 'create');

        $validator
            ->scalar('ContractorName')
            ->requirePresence('ContractorName', 'create')
            ->notEmpty('ContractorName');

        return $validator;
    }
}
