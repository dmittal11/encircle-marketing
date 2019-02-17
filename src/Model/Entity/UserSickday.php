<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSickday Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $duration
 * @property string $evidence
 *
 * @property \App\Model\Entity\Login $login
 */
class UserSickday extends Entity
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
        'user_id' => true,
        'duration' => true,
        'login' => true
    ];
}
