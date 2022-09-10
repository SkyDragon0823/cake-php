<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @method \App\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TicketsTable extends Table
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

        $this->setTable('tickets');
        $this->setDisplayField('folio');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->hasOne('Usuarios',[
            'classname' => 'solicitante',
            'foreignKey' => 'id',
            'propertyName' => 'idSolicitante',
            'bindingKey' => 'idSolicitante'
        ]);
        
        $this->hasOne('Tecnicos',[
            'foreignKey' => 'id',
            'propertyName' => 'idCuadrilla',
            'bindingKey' => 'idCuadrilla'
        ]);
        
        $this->hasOne('Sucursales',[
            'foreignKey' => 'id',
            'propertyName' => 'idSucursal',
            'bindingKey' => 'idSucursal'
        ]);

        $this->hasOne('Clientes',[
            'foreignKey' => 'id',
            'propertyName' => 'idCliente',
            'bindingKey' => 'idCliente'
        ]);
        
        $this->hasOne('Estatusticket',[
            'foreignKey' => 'id',
            'propertyName' => 'estatus',
            'bindingKey' => 'estatus'
        ]);
        
        $this->hasone('Tabulador',[
            'foreignKey' => 'id',
            'propertyName' => 'idProblemaReportado',
            'bindingKey' => 'idProblemaReportado'
        ]);
        
        $this->hasMany('Intervenciones',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'intervenciones'
        ]);
        
        $this->hasMany('Cuadrilla',[
            'foreignKey' => 'idTicket',
            'jointype' => 'INNER',
            'propertyName' => 'cuadrilla',
        ]);
        
        $this->hasMany('Serviciosticket',[
            'foreignKey' => 'idTicket',
            'jointype' => 'INNER',
            'propertyName' => 'Serviciosticket',
        ]);
        
        $this->hasOne('Vehiculos',[
            'foreignKey' => 'id',
            'propertyName' => 'idVehiculo',
            'bindingKey' => 'idVehiculo'
        ]);

        $this->hasMany('Comentarios',[
            'foreignKey' => 'idTicket',
            'jointype' => 'INNER',
            'propertyName' => 'comentariosTicket',
        ]);
        
        $this->hasMany('Gastos');
        
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('folio')
            ->maxLength('folio', 11)
            ->allowEmptyString('folio');

        $validator
            ->integer('idCliente')
            ->allowEmptyString('idCliente');

        $validator
            ->integer('clienteIndirecto')
            ->allowEmptyString('clienteIndirecto');

        $validator
            ->integer('idSolicitante')
            ->allowEmptyString('idSolicitante');

        $validator
            ->integer('idCoordinador')
            ->allowEmptyString('idCoordinador');

        $validator
            ->integer('idSucursal')
            ->allowEmptyString('idSucursal');

        $validator
            ->integer('idProblemaReportado')
            ->allowEmptyString('idProblemaReportado');

        $validator
            ->integer('idVehiculo')
            ->allowEmptyString('idVehiculo');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 500)
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('folioApertura')
            ->maxLength('folioApertura', 250)
            ->allowEmptyString('folioApertura');

        $validator
            ->scalar('folioCierre')
            ->maxLength('folioCierre', 250)
            ->allowEmptyString('folioCierre');

        $validator
            ->integer('estatus')
            ->allowEmptyString('estatus');

        $validator
            ->dateTime('fechaAtencion')
            ->allowEmptyDateTime('fechaAtencion');

        $validator
            ->integer('slas')
            ->allowEmptyString('slas');
        
        $validator
            ->integer('diasCredito')
            ->allowEmptyString('diasCredito');

        $validator
            ->integer('idTecnicoLider')
            ->allowEmptyString('idTecnicoLider');

        $validator
            ->integer('idTecnicoSub')
            ->allowEmptyString('idTecnicoSub');
        
        $validator
            ->decimal('costoTecnicoSub')
            ->allowEmptyString('costoTecnicoSub');
        
        $validator
            ->decimal('gastototal')
            ->allowEmptyString('gastototal');
        
        $validator
            ->decimal('costoTotal')
            ->allowEmptyString('costoTotal');

        $validator
            ->allowEmptyString('subcontrata');

    return $validator;

    }
    protected $_accessible = [
        'idTecnico' => true,
        'idTicket' => true,
        'idIntervencion' => true
    ];
}
