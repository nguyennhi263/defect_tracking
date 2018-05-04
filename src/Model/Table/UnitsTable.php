<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Units Model
 *
 * @method \App\Model\Entity\Unit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unit findOrCreate($search, callable $callback = null, $options = [])
 */
class UnitsTable extends Table
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

        $this->setTable('units');
        $this->setDisplayField('UnitID','UnitName');
        $this->setPrimaryKey('UnitID');
        $this->belongsTo('Blocks', [
            'foreignKey' => 'BlockID',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UnitTypes', [
            'foreignKey' => 'UnitTypeID',
            'joinType' => 'INNER'
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
            ->integer('UnitID')
            ->allowEmpty('UnitID', 'create');

        $validator
            ->integer('BlockID')
            ->requirePresence('BlockID', 'create')
            ->notEmpty('BlockID');

        $validator
            ->integer('UnitTypeID')
            ->requirePresence('UnitTypeID', 'create')
            ->notEmpty('UnitTypeID');

        $validator
            ->scalar('UnitName')
            ->maxLength('UnitName', 255)
            ->requirePresence('UnitName', 'create')
            ->notEmpty('UnitName');

        $validator
            ->integer('UnitFloor')
            ->requirePresence('UnitFloor', 'create')
            ->notEmpty('UnitFloor');

        return $validator;
    }
}
