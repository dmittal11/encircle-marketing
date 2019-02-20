<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserHolidays Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserHoliday get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserHoliday newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserHoliday[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserHoliday|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserHoliday|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserHoliday patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserHoliday[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserHoliday findOrCreate($search, callable $callback = null, $options = [])
 */
class UserHolidaysTable extends Table
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

        $this->setTable('user_holidays');
        $this->setDisplayField('User_id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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

        // $validator
        //     ->date('start_date')
        //     ->requirePresence('start_date', 'create')
        //     ->allowEmptyDate('start_date', false);
        //
        // $validator
        //     ->date('end_date')
        //     ->requirePresence('end_date', 'create')
        //     ->allowEmptyDate('end_date', false);

            $validator
                ->integer('user_id')
                ->requirePresence('user_id', 'create')
                ->allowEmptyString('user_id', false);

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
