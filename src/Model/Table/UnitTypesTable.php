<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UnitTypes Model
 *
 * @method \App\Model\Entity\UnitType get($primaryKey, $options = [])
 * @method \App\Model\Entity\UnitType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UnitType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UnitType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UnitType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UnitType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UnitType findOrCreate($search, callable $callback = null, $options = [])
 */
class UnitTypesTable extends Table
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

        $this->setTable('unit_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('UnitTypeID');
        $this->hasMany('DefectPlaces', [
            'foreignKey' => 'UnitTypeID'
        ]);
        $this->hasMany('Units', [
            'foreignKey' => 'UnitTypeID'
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
            ->integer('UnitTypeID')
            ->allowEmpty('UnitTypeID', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

       

        return $validator;
    }
}
