<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DefectItem Entity
 *
 * @property int $DefectItemID
 * @property int $DefectID
 * @property int $TradeDescriptionID
 * @property string $ImageFileNameBefore
 * @property string $ImageFileNameAfter
 * @property int $PlaceID
 * @property \Cake\I18n\FrozenTime $CloseDate
 * @property string $DefectStatus
 * @property string $Note
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DefectHeader $UnitNo
 * @property \App\Model\Entity\Contractor $ContractorName
 * @property \App\Model\Entity\DefectPlace $PlaceName
 * @property \App\Model\Entity\TradeDescription $TradeDescriptionName
 */
class DefectItem extends Entity
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
        'DefectID' => true,
        'TradeDescriptionID' => true,
        'ImageFileNameBefore' => true,
        'ImageFileNameAfter' => true,
        'PlaceID' => true,
        'CloseDate' => true,
        'DefectStatus' => true,
        'Note' => true,
        'created' => true,
        'modified' => true,
        'UnitNo' => true,
        'ContractorName' => true,
        'PlaceName' => true,
        'TradeDescriptionName' => true
    ];
}
