<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tiposervicio Model
 *
 * @method \App\Model\Entity\Tiposervicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tiposervicio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tiposervicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tiposervicio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiposervicio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiposervicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tiposervicio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tiposervicio findOrCreate($search, callable $callback = null, $options = [])
 */
class TiposervicioTable extends Table
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

        $this->setTable('tiposervicio');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Serviciosticket');
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
            ->scalar('servicio')
            ->maxLength('servicio', 150)
            ->allowEmptyString('servicio');

        return $validator;
    }
}
