<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdressesDescriptions Model
 *
 * @property \App\Model\Table\AdressesTable&\Cake\ORM\Association\BelongsTo $Adresses
 *
 * @method \App\Model\Entity\AdressesDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdressesDescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdressesDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdressesDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdressesDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdressesDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdressesDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdressesDescription findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdressesDescriptionsTable extends Table
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

        $this->setTable('adresses_descriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Adresses', [
            'foreignKey' => 'adress_id',
            'joinType' => 'INNER'
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
            ->scalar('ville')
            ->maxLength('ville', 255)
            ->allowEmptyString('ville');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->allowEmptyString('province');

        $validator
            ->scalar('pays')
            ->maxLength('pays', 255)
            ->allowEmptyString('pays');

        $validator
            ->scalar('zip_code')
            ->maxLength('zip_code', 255)
            ->allowEmptyString('zip_code');

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
        $rules->add($rules->existsIn(['adress_id'], 'Adresses'));

        return $rules;
    }
}
