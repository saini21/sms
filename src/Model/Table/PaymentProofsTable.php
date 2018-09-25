<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentProofs Model
 *
 * @method \App\Model\Entity\PaymentProof get($primaryKey, $options = [])
 * @method \App\Model\Entity\PaymentProof newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PaymentProof[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentProof|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentProof|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentProof patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentProof[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentProof findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentProofsTable extends Table {
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        
        $this->setTable('payment_proofs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'proof_image' => [
                'nameCallback' => function ($data, $settings) {
                    $parts = pathinfo($data['name']);
                    return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $parts['filename']) . '-' . uniqid() . '.' . $parts['extension']);
                },
                'restoreValueOnFailure' => false,
                'transformer' => function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                    
                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    
                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(200, 100);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();
                    
                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);
                    
                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $data['name'],
                        $tmp => 'thumbnail-' . $data['name'],
                    ];
                },
            ]
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
            ->allowEmpty('proof_image');
        
        $validator
            ->boolean('status')
            ->allowEmpty('status');
        
        return $validator;
    }
}
