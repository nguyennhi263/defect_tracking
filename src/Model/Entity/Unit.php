<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unit Entity
 *
 * @property int $UnitID
 * @property int $BlockID
 * @property int $UnitTypeID
 * @property string $UnitName
 * @property int $UnitFloor
 *
 * @property \App\Model\Entity\Block $block
 */
class Unit extends Entity
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
        'BlockID' => true,
        'UnitTypeID' => true,
        'UnitName' => true,
        'UnitFloor' => true,
        'block' => true
    ];
}
