<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DefectPlaces Model
 *
 * @method \App\Model\Entity\DefectPlace get($primaryKey, $options = [])
 * @method \App\Model\Entity\DefectPlace newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DefectPlace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DefectPlace|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DefectPlace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DefectPlace[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DefectPlace findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DefectPlacesTable extends Table
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

        $this->setTable('defect_places');
        $this->setDisplayField('DefectPlaceID');
        $this->setPrimaryKey('DefectPlaceID');

        $this->addBehavior('Timestamp');
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
            ->integer('DefectPlaceID')
            ->allowEmpty('DefectPlaceID', 'create');

        $validator
            ->integer('UnitTypeID')
            ->requirePresence('UnitTypeID', 'create')
            ->notEmpty('UnitTypeID');

        $validator
            ->scalar('DefectPlaceName')
            ->maxLength('DefectPlaceName', 255)
            ->requirePresence('DefectPlaceName', 'create')
            ->notEmpty('DefectPlaceName');

        $validator
            ->integer('coordX')
            ->requirePresence('coordX', 'create')
            ->notEmpty('coordX');

        $validator
            ->integer('coordY')
            ->requirePresence('coordY', 'create')
            ->notEmpty('coordY');

        return $validator;
    }
}
