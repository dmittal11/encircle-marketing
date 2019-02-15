<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logins Model
 *
 * @property \App\Model\Table\UserHolidaysTable|\Cake\ORM\Association\HasMany $UserHolidays
 * @property \App\Model\Table\UserSickdaysTable|\Cake\ORM\Association\HasMany $UserSickdays
 * @property \App\Model\Table\UserTimesheetsTable|\Cake\ORM\Association\HasMany $UserTimesheets
 *
 * @method \App\Model\Entity\Login get($primaryKey, $options = [])
 * @method \App\Model\Entity\Login newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Login[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Login|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Login|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Login patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Login[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Login findOrCreate($search, callable $callback = null, $options = [])
 */
class LoginsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('logins');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('UserHolidays', [
            'foreignKey' => 'login_id'
        ]);
        $this->hasMany('UserSickdays', [
            'foreignKey' => 'login_id'
        ]);
        $this->hasMany('UserTimesheets', [
            'foreignKey' => 'login_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 10000)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 10000)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator
            ->integer('available_days')
            ->requirePresence('available_days', 'create')
            ->allowEmptyString('available_days', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
