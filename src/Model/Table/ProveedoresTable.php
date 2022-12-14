<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proveedores Model
 *
 * @method \App\Model\Entity\Proveedore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proveedore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Proveedore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proveedore|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proveedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proveedore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProveedoresTable extends Table
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

        $this->setTable('proveedores');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');
        $this->hasOne('Gastos',[
            'foreignKey' => 'id',
            'className' => 'Gastos',
            'propertyName' => 'proveedores',
        ]);
        $this->hasOne('Estados',[
            'foreignKey' => 'id_estado',
            'jointype' => 'INNER',
            'propertyName' => 'estado',
            'bindingKey' => 'estado'
        ]);
        $this->hasOne('Paises',[
            'foreignKey' => 'id',
            'propertyName' => 'pais',
            'bindingKey' => 'pais'
        ]);

        $this->addBehavior('Timestamp');
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
            ->scalar('nombre')
            ->maxLength('nombre', 25)
            ->allowEmptyString('nombre');

        $validator
            ->scalar('servicio')
            ->maxLength('servicio', 25)
            ->allowEmptyString('servicio');

        $validator
            ->scalar('rfc')
            ->maxLength('rfc', 13)
            ->allowEmptyString('rfc');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 250)
            ->allowEmptyString('direccion');

        $validator
            ->scalar('localidad')
            ->maxLength('localidad', 250)
            ->allowEmptyString('localidad');

        $validator
            ->integer('estado')
            ->allowEmptyString('estado');

        $validator
            ->integer('pais')
            ->allowEmptyString('pais');

        $validator
            ->scalar('contacto')
            ->maxLength('contacto', 25)
            ->allowEmptyString('contacto');

        $validator
            ->scalar('correo')
            ->maxLength('correo', 50)
            ->allowEmptyString('correo');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 13)
            ->allowEmptyString('telefono');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 13)
            ->allowEmptyString('celular');

        $validator
            ->integer('estatus')
            ->allowEmptyString('estatus');

        return $validator;
    }
}
