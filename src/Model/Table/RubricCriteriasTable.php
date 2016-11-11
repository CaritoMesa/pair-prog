<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RubricCriterias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rubrics
 * @property \Cake\ORM\Association\HasMany $RubricLevels
 *
 * @method \App\Model\Entity\RubricCriteria get($primaryKey, $options = [])
 * @method \App\Model\Entity\RubricCriteria newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RubricCriteria[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RubricCriteria|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RubricCriteria patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RubricCriteria[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RubricCriteria findOrCreate($search, callable $callback = null)
 */
class RubricCriteriasTable extends Table
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

        $this->table('rubric_criterias');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Rubrics', [
            'foreignKey' => 'rubric_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('RubricLevels', [
            'foreignKey' => 'rubric_criteria_id'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['rubric_id'], 'Rubrics'));

        return $rules;
    }
}
