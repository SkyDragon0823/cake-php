<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gastos Model
 *
 * @method \App\Model\Entity\Gasto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gasto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gasto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gasto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gasto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gasto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gasto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gasto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GastosTable extends Table
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

        $this->setTable('gastos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tickets',[
            'bindingKey' => 'id',
            'foreignKey' => 'idTicket'
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
            ->allowEmptyString('idTicket');
            
        $validator
            ->allowEmptyString('idIntervencion');

        $validator
            ->scalar('tiposGasto')
            ->maxLength('tiposGasto', 50)
            ->allowEmptyString('tiposGasto');

        $validator
            ->scalar('conceptoGasto')
            ->maxLength('conceptoGasto', 250)
            ->allowEmptyString('conceptoGasto');

        $validator
            ->scalar('UIDFactura')
            ->maxLength('UIDFactura', 250)
            ->allowEmptyString('UIDFactura');

        $validator
            ->decimal('montoSinIva')
            ->allowEmptyString('montoSinIva');

        $validator
            ->decimal('montoTotal')
            ->allowEmptyString('montoTotal');

        $validator
            ->scalar('detalles')
            ->maxLength('detalles', 250)
            ->allowEmptyString('detalles');

        $validator
            ->allowEmptyString('deducible');

        return $validator;
    }
}
