<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DefectHeader Entity
 *
 * @property int $DefectID
 * @property int $UnitID
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Unit $UnitNo
 * @property \App\Model\Entity\DefectItem[] $defect_items
 */
class DefectHeader extends Entity
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
        'UnitID' => true,
        'created' => true,
        'modified' => true,
        'UnitNo' => true,
        'defect_items' => true
    ];
}
