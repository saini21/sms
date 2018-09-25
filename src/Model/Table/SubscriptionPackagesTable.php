<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubscriptionPackages Model
 *
 * @property \App\Model\Table\SubscriptionsTable|\Cake\ORM\Association\HasMany $Subscriptions
 *
 * @method \App\Model\Entity\SubscriptionPackage get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubscriptionPackage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubscriptionPackage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubscriptionPackage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubscriptionPackage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubscriptionPackage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubscriptionPackage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubscriptionPackage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubscriptionPackagesTable extends Table {
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->setTable('subscription_packages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        $this->hasMany('Subscriptions', [
            'foreignKey' => 'subscription_package_id'
        ]);
    }
    
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
        
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');
        
        $validator
            ->scalar('price')
            ->maxLength('price', 255)
            ->requirePresence('price', 'create')
            ->notEmpty('price');
        
        $validator
            ->scalar('earn_per_sms')
            ->maxLength('earn_per_sms', 255)
            ->requirePresence('earn_per_sms', 'create')
            ->notEmpty('earn_per_sms');
        
        $validator
            ->boolean('status')
            ->allowEmpty('status');
        
        return $validator;
    }
}
