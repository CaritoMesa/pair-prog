<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OAuthConsumers Model
 *
 * @method \App\Model\Entity\OAuthConsumer get($primaryKey, $options = [])
 * @method \App\Model\Entity\OAuthConsumer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OAuthConsumer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OAuthConsumer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OAuthConsumer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OAuthConsumer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OAuthConsumer findOrCreate($search, callable $callback = null)
 */
class OAuthConsumersTable extends Table
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

        $this->table('o_auth_consumers');
        $this->displayField('key_auth');
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
            ->requirePresence('key_auth', 'create')
            ->notEmpty('key_auth');

        $validator
            ->requirePresence('secret', 'create')
            ->notEmpty('secret');

        return $validator;
    }
}
