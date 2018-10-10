<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SentMessage Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property string $mobile
 * @property bool $status
 * @property int $approved
 * @property string $message_group
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class SentMessage extends Entity {
    
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'message' => true,
        'mobile' => true,
        'status' => true,
        'approved' => true,
        'message_group' => true,
        'is_duplicate' => true,
        'wrong_text' => true,
        'wrong_mobile' => true,
        'has_paid' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
