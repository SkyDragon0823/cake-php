<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tecnicos Model
 *
 * @method \App\Model\Entity\Tecnico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tecnico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tecnico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tecnico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tecnico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tecnico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tecnico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tecnico findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TecnicosTable extends Table
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

        $this->setTable('tecnicos');
        $this->setDisplayField(['nombre','apellido1']);
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cuadrilla',[
            'foreignKey' => 'idTicket',
            'jointype' => 'INNER',
            'propertyName' => 'cuadrilla',
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
            ->integer('idUsuario')
            ->allowEmptyString('idUsuario');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 60)
            ->allowEmptyString('nombre');

        $validator
            ->scalar('apellido1')
            ->maxLength('apellido1', 60)
            ->allowEmptyString('apellido1');

        $validator
            ->scalar('apellido2')
            ->maxLength('apellido2', 60)
            ->allowEmptyString('apellido2');

        $validator
            ->allowEmptyString('idCliente');

        $validator
            ->integer('idProveedor')
            ->allowEmptyString('idProveedor');

        $validator
            ->scalar('ims')
            ->maxLength('ims', 11)
            ->allowEmptyString('ims');

        $validator
            ->scalar('ubicacion')
            ->maxLength('ubicacion', 60)
            ->allowEmptyString('ubicacion');

        $validator
            ->scalar('puesto')
            ->maxLength('puesto', 11)
            ->allowEmptyString('puesto');

        $validator
            ->scalar('registroImms')
            ->maxLength('registroImms', 250)
            ->allowEmptyString('registroImms');

        $validator
            ->decimal('sueldo')
            ->allowEmptyString('sueldo');

        $validator
            ->scalar('domicilio')
            ->maxLength('domicilio', 250)
            ->allowEmptyString('domicilio');

        $validator
            ->scalar('celularEmpresa')
            ->maxLength('celularEmpresa', 13)
            ->allowEmptyString('celularEmpresa');

        $validator
            ->scalar('telefonoEmpresa')
            ->maxLength('telefonoEmpresa', 13)
            ->allowEmptyString('telefonoEmpresa');

        $validator
            ->scalar('rfc')
            ->maxLength('rfc', 13)
            ->allowEmptyString('rfc');

        $validator
            ->scalar('maxGradoEstudios')
            ->maxLength('maxGradoEstudios', 250)
            ->allowEmptyString('maxGradoEstudios');

        $validator
            ->scalar('ine')
            ->maxLength('ine', 250)
            ->allowEmptyString('ine');

        return $validator;
    }
}
