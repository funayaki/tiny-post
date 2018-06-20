<?php
namespace TinyPost\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostProperty Entity
 *
 * @property int $id
 * @property string $value
 * @property int $post_id
 * @property string $key
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $position
 *
 * @property \TinyPost\Model\Entity\Post $post
 */
class PostProperty extends Entity
{

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
        'value' => true,
        'post_id' => true,
        'key' => true,
        'created' => true,
        'updated' => true,
        'position' => true,
        'post' => true
    ];
}
