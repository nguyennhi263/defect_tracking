<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TradeTypes Model
 *
 * @method \App\Model\Entity\TradeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TradeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TradeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TradeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TradeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TradeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TradeType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TradeTypesTable extends Table
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

        $this->setTable('trade_types');
        $this->setDisplayField('TradeTypeID');
        $this->setPrimaryKey('TradeTypeID');
        $this->hasMany('Trades', [
            'foreignKey' => 'TradeTypeID'
        ]);
        $this->addBehavior('Timestamp');
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
            ->integer('TradeTypeID')
            ->allowEmpty('TradeTypeID', 'create');

        $validator
            ->scalar('TradeTypeName')
            ->maxLength('TradeTypeName', 255)
            ->requirePresence('TradeTypeName', 'create')
            ->notEmpty('TradeTypeName');

        return $validator;
    }
}
