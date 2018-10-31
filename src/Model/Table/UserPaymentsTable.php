<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserPayments Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserPayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserPayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserPayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserPayment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserPayment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserPayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserPayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserPayment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserPaymentsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('user_payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', ['foreignKey' => 'user_id', 'joinType' => 'INNER']);

        //ALTER TABLE  `users` ADD  `total_paid` FLOAT NOT NULL AFTER  `has_plan`;
        $this->addBehavior('CounterCache', ['Users' => ['total_paid' => function ($event, $entity, $table, $original) {
            $payment = $table->find('all')->select(['sum' => 'SUM(payment)'])->first();
            return $payment->sum;
        }]]);

        //INSERT INTO `sms`.`options` (`id`, `category`, `option_name`, `option_value`, `default_value`, `created`, `modified`) VALUES (NULL, 'Penalties', 'duplicate_sms_penality', '10', '10', '', '');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');

        $validator->numeric('payment')->requirePresence('payment', 'create')->notEmpty('payment');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
