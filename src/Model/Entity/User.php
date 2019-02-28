<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $available_days
 * @property bool $admin
 *
 * @property \App\Model\Entity\UserHoliday[] $user_holidays
 * @property \App\Model\Entity\Usersickday[] $user_sickdays
 * @property \App\Model\Entity\UserTimesheet[] $user_timesheets
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
        'username' => true,
        'password' => true,
        'available_days' => true,
        'admin' => true,
        'user_holidays' => true,
        'user_sickdays' => true,
        'user_timesheets' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
      if (strlen($password) > 0) {
        return (new DefaultPasswordHasher)->hash($password);
      }
  }
}
