<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Slas Model
 *
 * @method \App\Model\Entity\Sla get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sla newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sla[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sla|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sla saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sla patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sla[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sla findOrCreate($search, callable $callback = null, $options = [])
 */
class SlasTable extends Table
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

        $this->setTable('slas');
        $this->setDisplayField(['nombre','periodo']);
        $this->setPrimaryKey('id');
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
            ->maxLength('nombre', 150)
            ->allowEmptyString('nombre');

        $validator
            ->integer('periodo')
            ->allowEmptyString('periodo');

        $validator
            ->integer('estado')
            ->allowEmptyString('estado');

        return $validator;
    }
}
