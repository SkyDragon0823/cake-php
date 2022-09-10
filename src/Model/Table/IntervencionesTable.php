<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Intervenciones Model
 *
 * @method \App\Model\Entity\Intervencione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Intervencione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Intervencione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Intervencione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Intervencione saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Intervencione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Intervencione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Intervencione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IntervencionesTable extends Table
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

        $this->setTable('intervenciones');
        $this->setDisplayField('folio');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        $this->hasOne('Tickets',[
            'foreignKey' => 'id',
            'propertyName' => 'idTicket',
            'bindingKey' => 'idTicket'
        ]);
        
        $this->hasOne('Estatusticket',[
            'foreignKey' => 'id',
            'propertyName' => 'estatus',
            'bindingKey' => 'estatus'
        ]);
        
        $this->hasMany('Cuadrilla',[
            'foreignKey' => 'idIntervencion',
            'jointype' => 'INNER',
            'propertyName' => 'cuadrilla',
        ]);

        $this->hasOne('Vehiculos',[
            'foreignKey' => 'id',
            'propertyName' => 'idVehiculo',
            'bindingKey' => 'idVehiculo'
        ]);

        $this->hasOne('Usuarios',[
            'classname' => 'solicitante',
            'foreignKey' => 'id',
            'propertyName' => 'idSolicitante',
            'bindingKey' => 'idSolicitante'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('folio')
            ->maxLength('folio', 11)
            ->allowEmptyString('folio');

        $validator
            ->integer('slas')
            ->allowEmptyString('slas');

        $validator
            ->allowEmptyString('idTicket');

        $validator
            ->integer('idVehiculo')
            ->allowEmptyString('idVehiculo');

        $validator
            ->dateTime('fechaAtencion')
            ->allowEmptyDateTime('fechaAtencion');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 250)
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
            ->integer('idTecnicoLider')
            ->allowEmptyString('idTecnicoLider');

        $validator
            ->allowEmptyString('subcontrata');

        $validator
            ->integer('idTecnicoSub')
            ->allowEmptyString('idTecnicoSub');
        
        $validator
            ->integer('idSolicitante')
            ->allowEmptyString('idSolicitante');

        return $validator;
    }
}
