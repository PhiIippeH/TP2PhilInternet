<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;


/**
 * Adresses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AdressesDescriptionsTable&\Cake\ORM\Association\HasMany $AdressesDescriptions
 * @property \App\Model\Table\ExpeditionsTable&\Cake\ORM\Association\BelongsToMany $Expeditions
 * @property \App\Model\Table\FilesTable&\Cake\ORM\Association\BelongsToMany $Files
 *
 * @method \App\Model\Entity\Adress get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adress|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adress saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adress findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdressesTable extends Table
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

        $this->addBehavior('Translate', ['fields' => ['type_domicile','facture']]);
        $this->addBehavior('Timestamp');
        $this->belongsToMany('expeditions'); // Ajoutez cette ligne

        $this->setTable('adresses');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Subcategories', [
            'foreignKey' => 'subcategory_id'
        ]);

        $this->hasMany('AdressesDescriptions', [
            'foreignKey' => 'adress_id'
        ]);
        $this->belongsToMany('Expeditions', [
            'foreignKey' => 'adress_id',
            'targetForeignKey' => 'expedition_id',
            'joinTable' => 'adresses_expeditions'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'adress_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'adresses_files'
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

      /*  $validator
            ->dateTime('date_adresse_envoi')
            ->allowEmptyDateTime('date_adresse_envoi');

        $validator
            ->dateTime('date_adresse_Reception')
            ->allowEmptyDateTime('date_adresse_Reception'); */

        $validator
            ->scalar('type_domicile')
            ->maxLength('type_domicile', 200)
            ->allowEmptyString('type_domicile');

        $validator
            ->scalar('facture')
            ->maxLength('facture', 200)
            ->allowEmptyString('facture');

      /*  $validator
            ->scalar('slug')
            ->maxLength('slug', 191)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']); */

        $validator
            ->boolean('published')
            ->allowEmptyString('published');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function beforeSave($event, $entity, $options) {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

}
