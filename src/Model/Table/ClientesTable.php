<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasMany('Sucursales');
        $this->hasOne('Tabulador');
        $this->hasOne('Estados',[
            'foreignKey' => 'id_estado',
            'jointype' => 'INNER',
            'propertyName' => 'estado',
            'bindingKey' => 'estado'
        ]);
        $this->hasOne('Municipios',[
            'foreignKey' => 'id_municipio',
            'jointype' => 'INNER',
            'propertyName' => 'municipio',
            'bindingKey' => 'municipio'
        ]);
        $this->hasOne('Estatus',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'estatus',
            'bindingKey' => 'estatus'
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
            ->scalar('nombre')
            ->maxLength('nombre', 25)
            ->allowEmptyString('nombre',false);

        $validator
            ->scalar('prefijo')
            ->maxLength('prefijo', 3)
            ->allowEmptyString('prefijo');
        
        $validator
            ->scalar('rfc')
            ->maxLength('rfc', 13)
            ->allowEmptyString('rfc');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 250)
            ->allowEmptyString('direccion');

        $validator
            ->integer('estado')
            ->allowEmptyString('estado');

        $validator
            ->integer('municipio')
            ->allowEmptyString('municipio');

        $validator
            ->scalar('colonia')
            ->maxLength('colonia', 150)
            ->allowEmptyString('colonia');

        $validator
            ->integer('codigoPostal')
            ->allowEmptyString('codigoPostal');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 12)
            ->allowEmptyString('telefono');
        
        $validator
            ->scalar('protocolo')
            ->maxLength('protocolo', 250)
            ->allowEmptyString('protocolo');

        $validator
            ->integer('estatus')
            ->allowEmptyString('estatus');

        return $validator;
    }
    
}
