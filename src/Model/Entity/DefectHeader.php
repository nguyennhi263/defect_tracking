<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DefectHeader Entity
 *
 * @property int $DefectID
 * @property int $UnitID
 * @property string $RecordStatus
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
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
        'RecordStatus' => true,
        'created' => true,
        'modified' => true
    ];
}
