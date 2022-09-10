<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ordencompra Model
 *
 * @method \App\Model\Entity\Ordencompra get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ordencompra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ordencompra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ordencompra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ordencompra|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ordencompra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ordencompra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ordencompra findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdencompraTable extends Table
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

        $this->setTable('ordencompra');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->allowEmptyString('id', 'create');

        $validator
            ->allowEmptyString('idTicket');

        $validator
            ->scalar('solicitante')
            ->maxLength('solicitante', 150)
            ->allowEmptyString('solicitante');

        $validator
            ->scalar('departamento')
            ->maxLength('departamento', 150)
            ->allowEmptyString('departamento');

        $validator
            ->scalar('lugarEntrega')
            ->maxLength('lugarEntrega', 150)
            ->allowEmptyString('lugarEntrega');

        $validator
            ->scalar('responsable')
            ->maxLength('responsable', 50)
            ->allowEmptyString('responsable');

        $validator
            ->decimal('total')
            ->allowEmptyString('total');

        return $validator;
    }
}
