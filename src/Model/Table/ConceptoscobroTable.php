<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conceptoscobro Model
 *
 * @method \App\Model\Entity\Conceptoscobro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conceptoscobro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conceptoscobro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conceptoscobro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conceptoscobro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conceptoscobro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conceptoscobro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conceptoscobro findOrCreate($search, callable $callback = null, $options = [])
 */
class ConceptoscobroTable extends Table
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

        $this->setTable('conceptoscobro');
        $this->setDisplayField('idOrdenCompra');
        $this->setPrimaryKey('idOrdenCompra');
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
            ->allowEmptyString('idOrdenCompra', 'create');

        $validator
            ->integer('cantidad')
            ->allowEmptyString('cantidad');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 25)
            ->allowEmptyString('marca');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 25)
            ->allowEmptyString('modelo');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 250)
            ->allowEmptyString('descripcion');

        $validator
            ->integer('idProveedor')
            ->allowEmptyString('idProveedor');

        $validator
            ->decimal('precio')
            ->allowEmptyString('precio');

        return $validator;
    }
}
