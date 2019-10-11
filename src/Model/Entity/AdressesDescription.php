<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdressesDescription Entity
 *
 * @property int $id
 * @property int $adress_id
 * @property string|null $ville
 * @property string|null $province
 * @property string|null $pays
 * @property string|null $zip_code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Adress $adress
 */
class AdressesDescription extends Entity
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
        'adress_id' => true,
        'ville' => true,
        'province' => true,
        'pays' => true,
        'zip_code' => true,
        'created' => true,
        'modified' => true,
        'adress' => true
    ];
}
