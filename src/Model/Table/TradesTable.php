<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trades Model
 *
 * @method \App\Model\Entity\Trade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trade findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TradesTable extends Table
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

        $this->setTable('trades');
        $this->setDisplayField('TradeName');
        $this->setPrimaryKey('TradeID');
        $this->belongsTo('TradeTypes', [
            'foreignKey' => 'TradeTypeID',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TradeDescriptions', [
            'foreignKey' => 'TradeID'
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
            ->integer('TradeID')
            ->allowEmpty('TradeID', 'create');

        $validator
            ->integer('TradeTypeID')
            ->requirePresence('TradeTypeID', 'create')
            ->notEmpty('TradeTypeID');

        $validator
            ->scalar('TradeName')
            ->maxLength('TradeName', 255)
            ->requirePresence('TradeName', 'create')
            ->notEmpty('TradeName');

        return $validator;
    }
}
