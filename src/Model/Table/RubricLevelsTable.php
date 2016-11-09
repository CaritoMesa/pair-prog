<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RubricLevels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RubricCriterias
 *
 * @method \App\Model\Entity\RubricLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\RubricLevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RubricLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RubricLevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RubricLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RubricLevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RubricLevel findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RubricLevelsTable extends Table
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

        $this->table('rubric_levels');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RubricCriterias', [
            'foreignKey' => 'rubric_criteria_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('definition', 'create')
            ->notEmpty('definition');

        $validator
            ->decimal('score')
            ->requirePresence('score', 'create')
            ->notEmpty('score');

        $validator
            ->date('modiefied')
            ->allowEmpty('modiefied');

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
        $rules->add($rules->existsIn(['rubric_criteria_id'], 'RubricCriterias'));

        return $rules;
    }
}
