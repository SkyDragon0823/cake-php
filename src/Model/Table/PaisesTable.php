<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paises Model
 *
 * @method \App\Model\Entity\Paise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Paise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paise findOrCreate($search, callable $callback = null, $options = [])
 */
class PaisesTable extends Table
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

        $this->setTable('paises');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');
        $this->hasOne('Proveedores',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'pais',
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('iso')
            ->maxLength('iso', 2)
            ->allowEmptyString('iso');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 80)
            ->allowEmptyString('nombre');

        return $validator;
    }
}
