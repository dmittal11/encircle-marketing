<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserTimesheets Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserTimesheet get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserTimesheet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserTimesheet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserTimesheet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserTimesheet|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserTimesheet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserTimesheet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserTimesheet findOrCreate($search, callable $callback = null, $options = [])
 */
class UserTimesheetsTable extends Table
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

        $this->setTable('user_timesheets');
        $this->setDisplayField('User_id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        // $this->addBehavior('Calendar.Calendar', [
        //   'start_date' => 'beginning',
        //   'end_date' => 'end',
        //   'scope' => ['invisible' => false],
        // ]);
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
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->allowEmptyDate('start_date', false);

        $validator
            ->time('start_time')
            ->requirePresence('start_time', 'create')
            ->allowEmptyTime('start_time', false);

        $validator
            ->time('end_time')
            ->requirePresence('end_time', 'create')
            ->allowEmptyTime('end_time', false);

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->allowEmptyString('duration', false);

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
