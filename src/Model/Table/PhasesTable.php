<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phases Model
 *
 * @method \App\Model\Entity\Phase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phase findOrCreate($search, callable $callback = null, $options = [])
 */
class PhasesTable extends Table
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

        $this->setTable('phases');
        $this->setDisplayField('PhaseName');
        $this->setPrimaryKey('PhaseID');
        $this->belongsTo('Projects', [
            'foreignKey' => 'ProjectID',
            'joinType' => 'INNER',
            'propertyName' => 'ProjectName'
        ]);
        $this->hasMany('Blocks', [
            'foreignKey' => 'PhaseID'
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
            ->integer('PhaseID')
            ->allowEmpty('PhaseID', 'create');

        $validator
            ->scalar('PhaseName')
            ->maxLength('PhaseName', 255)
            ->requirePresence('PhaseName', 'create')
            ->notEmpty('PhaseName');

        $validator
            ->requirePresence('ProjectID', 'create')
            ->notEmpty('ProjectID');

        return $validator;
    }
}
