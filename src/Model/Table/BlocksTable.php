<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocks Model
 *
 * @method \App\Model\Entity\Block get($primaryKey, $options = [])
 * @method \App\Model\Entity\Block newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Block[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Block|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Block patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Block[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Block findOrCreate($search, callable $callback = null, $options = [])
 */
class BlocksTable extends Table
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

        $this->setTable('blocks');
        $this->setDisplayField('BlockName');
        $this->setPrimaryKey('BlockID');
        $this->belongsTo('Phases', [
                    'foreignKey' => 'PhaseID',
                    'joinType' => 'INNER'
                ]);
        $this->belongsTo('Contractors', [
                    'foreignKey' => 'ContractorID',
                    'joinType' => 'INNER'
                ]);
        $this->hasMany('Units', [
            'foreignKey' => 'BlockID'
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
            ->integer('BlockID')
            ->allowEmpty('BlockID', 'create');

        $validator
            ->requirePresence('PhaseID', 'create')
            ->notEmpty('PhaseID');

        $validator
            ->scalar('BlockName')
            ->maxLength('BlockName', 255)
            ->requirePresence('BlockName', 'create')
            ->notEmpty('BlockName');

        $validator
            ->integer('ContractorID')
            ->requirePresence('ContractorID', 'create')
            ->notEmpty('ContractorID');

        return $validator;
    }
}
