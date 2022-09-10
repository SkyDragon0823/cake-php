<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiculos Model
 *
 * @method \App\Model\Entity\Vehiculo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiculo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiculo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiculo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo findOrCreate($search, callable $callback = null, $options = [])
 */
class VehiculosTable extends Table
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

        $this->setTable('vehiculos');
        $this->setDisplayField(['modelo','placa']);
        $this->setPrimaryKey('id');

        $this->hasOne('Clientes',[
            'foreignKey' => 'id',
            'className' => 'clientes',
            'propertyName' => 'cliente',
            'bindingKey' => 'cliente'
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
            ->scalar('marca')
            ->maxLength('marca', 50)
            ->allowEmptyString('marca');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 50)
            ->allowEmptyString('modelo');

        $validator
            ->scalar('placa')
            ->maxLength('placa', 7)
            ->allowEmptyString('placa');

        $validator
            ->integer('idRastreador')
            ->allowEmptyString('idRastreador');

        return $validator;
    }
}
