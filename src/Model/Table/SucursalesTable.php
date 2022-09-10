<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sucursales Model
 *
 * @method \App\Model\Entity\Sucursale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sucursale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sucursale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sucursale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sucursale|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sucursale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sucursale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sucursale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SucursalesTable extends Table
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
        $this->setTable('sucursales');
        $this->setDisplayField(['cr','sucursal']);
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');

        $this->belongsTo('Clientes',[
            'foreignKey' => 'idCliente',
            'jointype' => 'INNER',
            'propertyName' => 'cliente',
            ]);

        $this->hasOne('Estados',[
            'foreignKey' => 'id_estado',
            'jointype' => 'INNER',
            'propertyName' => 'estado',
            'bindingKey' => 'estado'
        ]);
        $this->hasOne('Tickets',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'tickets',
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
            ->integer('idCliente')
            ->allowEmptyString('idCliente');

        $validator
            ->scalar('sucursal')
            ->maxLength('sucursal', 25)
            ->allowEmptyString('sucursal');

        $validator
            ->scalar('cr')
            ->maxLength('cr', 25)
            ->allowEmptyString('cr');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 250)
            ->allowEmptyString('direccion');

        $validator
            ->scalar('colonia')
            ->maxLength('colonia', 150)
            ->allowEmptyString('colonia');

        $validator
            ->scalar('localidad')
            ->maxLength('localidad', 150)
            ->allowEmptyString('localidad');

        $validator
            ->scalar('codigoPostal')
            ->maxLength('codigoPostal', 5)
            ->allowEmptyString('codigoPostal');

        $validator
            ->scalar('lada')
            ->maxLength('lada', 12)
            ->allowEmptyString('lada');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 12)
            ->allowEmptyString('telefono');

        $validator
            ->integer('estado')
            ->allowEmptyString('estado');

        $validator
            ->integer('estatus')
            ->allowEmptyString('estatus');

        return $validator;
    }
}