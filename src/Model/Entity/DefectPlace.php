<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DefectPlace Entity
 *
 * @property int $DefectPlaceID
 * @property int $UnitTypeID
 * @property string $DefectPlaceName
 * @property int $coordX
 * @property int $coordY
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UnitType $unit_type
 */
class DefectPlace extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'UnitTypeID' => true,
        'DefectPlaceName' => true,
        'coordX' => true,
        'coordY' => true,
        'created' => true,
        'modified' => true,
        'unit_type' => true
    ];
}
