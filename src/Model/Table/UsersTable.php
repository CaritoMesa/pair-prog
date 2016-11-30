<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $LtiUsers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('first_name', ' ', 'last_name');
        $this->primaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('lti_user_id', function ($c) {
                return empty($c['data']['password']);
            })
            ->notEmpty('lti_user_id', 'Lti user id or password is required ', function ($c) {
                return empty($c['data']['password']);
            })
            ->add('lti_user_id', 'custom', [
                'rule' => function ($value, $c) {
                    return empty($value);
                },
                'on' => function ($c) {
                    return !empty($c['data']['password']);
                },
                'message' => 'Lti user should not have a password. Leave this field blank'
            ])
        ;

        $validator
            ->requirePresence('password', function ($c) {
                return empty($c['data']['lti_user_id']);
            })
            ->notEmpty('password', 'Lti user id or password is required',function ($c) {
                return empty($c['data']['lti_user_id']);
            })
            ->add('password', 'custom', [
                'rule' => function ($value, $c) {
                    return empty($value);
                },
                'on' => function ($c) {
                    return !empty($c['data']['lti_user_id']);
                },
                'message' => 'Password should be empty if it is an lti user'
            ])
        ;

        $validator
            ->requirePresence('username')
            ->notEmpty('username');

        return $validator;
    }

}
