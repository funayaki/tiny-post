<?php
namespace TinyPost\Model\Table;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostProperties Model
 *
 * @property \TinyPost\Model\Table\PostsTable|\Cake\ORM\Association\BelongsTo $Posts
 *
 * @method \TinyPost\Model\Entity\PostProperty get($primaryKey, $options = [])
 * @method \TinyPost\Model\Entity\PostProperty newEntity($data = null, array $options = [])
 * @method \TinyPost\Model\Entity\PostProperty[] newEntities(array $data, array $options = [])
 * @method \TinyPost\Model\Entity\PostProperty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \TinyPost\Model\Entity\PostProperty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \TinyPost\Model\Entity\PostProperty[] patchEntities($entities, array $data, array $options = [])
 * @method \TinyPost\Model\Entity\PostProperty findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostPropertiesTable extends Table
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

        $this->setTable('post_properties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'className' => 'TinyPost.Posts'
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
            ->scalar('value')
            ->maxLength('value', 150)
            ->allowEmpty('value');

        $validator
            ->scalar('key')
            ->maxLength('key', 150)
            ->allowEmpty('key');

        $validator
            ->integer('position')
            ->allowEmpty('position');

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
        $rules->add($rules->existsIn(['post_id'], 'Posts'));

        return $rules;
    }

    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        $this->getConnection()->getDriver()->enableAutoQuoting(true);
    }

    public function afterSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        $this->getConnection()->getDriver()->enableAutoQuoting(false);
    }
}
