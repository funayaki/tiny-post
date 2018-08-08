<?php
namespace TinyPost\Model\Table;

use Cake\I18n\Time;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @method \TinyPost\Model\Entity\Post get($primaryKey, $options = [])
 * @method \TinyPost\Model\Entity\Post newEntity($data = null, array $options = [])
 * @method \TinyPost\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \TinyPost\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \TinyPost\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \TinyPost\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \TinyPost\Model\Entity\Post findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostsTable extends Table
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

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('title')
            ->maxLength('title', 150)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('body')
            ->allowEmpty('body');

        $validator
            ->scalar('excerpt')
            ->allowEmpty('excerpt');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 150)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->maxLength('description', 150)
            ->allowEmpty('description');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 150)
            ->allowEmpty('keywords');

        $validator
            ->dateTime('available')
            ->allowEmpty('available');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

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
        $rules->add($rules->isUnique(['slug']));

        return $rules;
    }

    /**
     * @param Query $query
     * @param array $options
     * @return $this
     */
    public function findAvailable(Query $query, array $options)
    {
        return $query->where([
            $this->getAlias() . '.available <=' => (new Time())->format('Y-m-d H:i:s'),
            'OR' => [
                $this->getAlias() . '.deleted IS' => null,
                $this->getAlias() . '.deleted >' => (new Time())->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
