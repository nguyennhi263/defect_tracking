<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DefectItems Model
 *
 * @method \App\Model\Entity\DefectItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\DefectItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DefectItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DefectItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DefectItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DefectItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DefectItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DefectItemsTable extends Table
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

        $this->setTable('defect_items');
        $this->setDisplayField('DefectItemID');
        $this->setPrimaryKey('DefectItemID');

        $this->addBehavior('Timestamp');
         $this->belongsTo('DefectHeaders', [
            'foreignKey' => 'DefectID',
            'joinType' => 'INNER',
            'propertyName' => 'UnitNo'
        ]);
        $this->belongsTo('DefectPlaces', [
            'foreignKey' => 'PlaceID',
            'joinType' => 'INNER',
            'propertyName' => 'PlaceName'
        ]);
        $this->belongsTo('DefectPlaces', [
            'foreignKey' => 'PlaceID',
            'joinType' => 'INNER',
            'propertyName' => 'PlaceName'
        ]);
        $this->belongsTo('TradeDescriptions', [
            'foreignKey' => 'TradeDescriptionID',
            'joinType' => 'INNER',
            'propertyName' => 'TradeDescriptionName'
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
            ->integer('DefectItemID')
            ->allowEmpty('DefectItemID', 'create');

        $validator
            ->integer('DefectID')
            ->requirePresence('DefectID', 'create')
            ->notEmpty('DefectID');

        $validator
            ->integer('TradeDescriptionID')
            ->requirePresence('TradeDescriptionID', 'create')
            ->notEmpty('TradeDescriptionID');

        $validator
            ->scalar('ImageFileNameBefore')
            ->allowEmpty('ImageFileNameBefore');

        $validator
            ->scalar('ImageFileNameAfter')
            ->allowEmpty('ImageFileNameAfter');

        $validator
            ->integer('PlaceID')
            ->requirePresence('PlaceID', 'create')
            ->notEmpty('PlaceID');

        $validator
            ->dateTime('CloseDate')
            ->allowEmpty('CloseDate');

        $validator
            ->scalar('DefectStatus')
            ->requirePresence('DefectStatus', 'create')
            ->notEmpty('DefectStatus');

        $validator
            ->scalar('Note')
            ->maxLength('Note', 255)
            ->allowEmpty('Note');

        return $validator;
    }
}
