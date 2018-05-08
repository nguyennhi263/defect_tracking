<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; // hash password
/**
 * User Entity
 *
 * @property int $UserID
 * @property string $LoginName
 * @property string $UserPass
 * @property int $PositionID
 * @property string $FullName
 * @property string $Email
 * @property string $Imei
 * @property string $RecordStatus
 */
class User extends Entity
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
        'LoginName' => true,
        'UserPass' => true,
        'PositionID' => true,
        'FullName' => true,
        'Email' => true,
        'Imei' => true,
        'RecordStatus' => true
    ];

    protected $_hidden = [
        'UserPass'
    ];
    protected function _setUserPass($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
