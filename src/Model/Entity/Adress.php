<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adress Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property \Cake\I18n\FrozenTime|null $date_adresse_envoi
 * @property \Cake\I18n\FrozenTime|null $date_adresse_Reception
 * @property string|null $type_domicile
 * @property string|null $facture
 * @property string $slug
 * @property bool|null $published
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AdressesDescription[] $adresses_descriptions
 * @property \App\Model\Entity\Expedition[] $expeditions
 * @property \App\Model\Entity\File[] $files
 */
class Adress extends Entity
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
        'user_id' => true,
        'title' => true,
        'date_adresse_envoi' => true,
        'date_adresse_Reception' => true,
        'type_domicile' => true,
        'facture' => true,
        'slug' => true,
        'published' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'adresses_descriptions' => true,
        'expeditions' => true,
        'files' => true
    ];
}
