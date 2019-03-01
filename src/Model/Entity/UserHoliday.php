<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserHoliday Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $days_available
 * @property string $status
 *
 * @property \App\Model\Entity\Login $login
 */
class UserHoliday extends Entity
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
        'start_date' => true,
        'end_date' => true,
        'days_available' => true,
        'login' => true,
        'status' => true
    ];
}
