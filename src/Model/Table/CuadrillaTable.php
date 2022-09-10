<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cuadrilla Model
 *
 * @method \App\Model\Entity\Cuadrilla get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cuadrilla newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cuadrilla[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cuadrilla|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cuadrilla saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cuadrilla patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cuadrilla[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cuadrilla findOrCreate($search, callable $callback = null, $options = [])
 */
class CuadrillaTable extends Table
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

        $this->setTable('cuadrilla');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tickets',[
            'foreignKey' => 'idTicket',
            'joinType' => 'INNER',
            'dependent' => true,
        ]);
        
        $this->belongsTo('Intervenciones',[
            'foreignKey' => 'idIntervencion',
            'joinType' => 'INNER',
            'dependent' => true,
        ]);

        $this->hasOne('Tecnicos',[
            'foreignKey' => 'id',
            'propertyName' => 'idTecnico',
            'bindingKey' => 'idTecnico'
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
            ->integer('idTecnico')
            ->allowEmptyString('idTecnico');

        $validator
            ->allowEmptyString('idTicket');

        $validator
            ->allowEmptyString('idIntervencion');

        return $validator;
    }
}
