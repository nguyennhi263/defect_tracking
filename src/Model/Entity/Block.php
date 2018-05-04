<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Block Entity
 *
 * @property int $BlockID
 * @property int $PhaseID
 * @property string $BlockName
 * @property int $ContractorID
 *
 * @property \App\Model\Entity\Phase $phase
 * @property \App\Model\Entity\Unit[] $units
 */
class Block extends Entity
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
        'PhaseID' => true,
        'BlockName' => true,
        'ContractorID' => true,
        'phase' => true,
        'units' => true
    ];
}
