<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DefectHeaders Model
 *
 * @method \App\Model\Entity\DefectHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\DefectHeader newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DefectHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DefectHeader|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DefectHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DefectHeader[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DefectHeader findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DefectHeadersTable extends Table
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

        $this->setTable('defect_headers');
        $this->setDisplayField('DefectID');
        $this->setPrimaryKey('DefectID');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Units', [
            'foreignKey' => 'UnitID',
            'joinType' => 'INNER',
            'propertyName' => 'UnitNo'
        ]);
        $this->hasMany('DefectItems', [
            'foreignKey' => 'DefectID'
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
            ->integer('DefectID')
            ->allowEmpty('DefectID', 'create');

        $validator
            ->integer('UnitID')
            ->requirePresence('UnitID', 'create')
            ->notEmpty('UnitID');

        $validator
            ->scalar('RecordStatus')
            ->requirePresence('RecordStatus', 'create')
            ->notEmpty('RecordStatus');

        return $validator;
    }
}
