<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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
        $this->setTable('users');
        $this->setDisplayField('UserID');
        $this->setPrimaryKey('UserID');
        $this->belongsTo('UserPositions', [
            'foreignKey' => 'PositionID',
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
            ->integer('UserID')
            ->allowEmpty('UserID', 'create');

        $validator
            ->scalar('LoginName')
            ->maxLength('LoginName', 255)
            ->requirePresence('LoginName', 'create')
            ->notEmpty('LoginName');

        $validator
            ->scalar('UserPass')
            ->maxLength('UserPass', 255)
            ->requirePresence('UserPass', 'create')
            ->notEmpty('UserPass');

        $validator
            ->integer('PositionID')
            ->requirePresence('PositionID', 'create')
            ->notEmpty('PositionID');

        $validator
            ->scalar('FullName')
            ->maxLength('FullName', 255)
            ->requirePresence('FullName', 'create')
            ->notEmpty('FullName');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 255)
            ->allowEmpty('Email');

        $validator
            ->scalar('Imei')
            ->maxLength('Imei', 255)
            ->allowEmpty('Imei');

        $validator
            ->scalar('RecordStatus')
            ->maxLength('RecordStatus', 255)
            ->allowEmpty('RecordStatus');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['LoginName'],'Sorry, This username has been used. Choose another name.'));

        return $rules;
    }
}
