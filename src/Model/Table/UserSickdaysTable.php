<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usersickdays Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Usersickday get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usersickday newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usersickday[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usersickday|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usersickday|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usersickday patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usersickday[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usersickday findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersickdaysTable extends Table
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

        $this->setTable('user_sickdays');
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


        /*

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->allowEmptyDate('start_date', false);

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->allowEmptyDate('end_date', false);
            */

        $validator
            ->scalar('duration')
            ->maxLength('duration', 10000)
            ->requirePresence('duration', 'create')
            ->allowEmptyString('duration', false);

        $validator
            ->requirePresence('file', 'create')
            ->allowEmptyFile('file', false);

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
