<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estados Model
 *
 * @method \App\Model\Entity\Estado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estado|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estado findOrCreate($search, callable $callback = null, $options = [])
 */
class EstadosTable extends Table
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

        $this->setTable('estados');
        $this->setDisplayField('estado');
        $this->setPrimaryKey('id_estado');
        $this->hasMany('Clientes',[
            'foreignKey' => 'id',
            'className' => 'Clientes',
            'propertyName' => 'estado',
        ]);
        $this->hasMany('Municipios',[
            'propertyName' => 'idmunicipios',
        ]);
        $this->hasMany('Sucursales',[
            'foreignKey' => 'id',
            'className' => 'Sucursales',
            'propertyName' => 'sucursales',
        ]);
        $this->hasMany('Proveedores',[
            'foreignKey' => 'id',
            'className' => 'Proveedores',
            'propertyName' => 'estado',
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
            ->integer('id_estado')
            ->allowEmptyString('id_estado', 'create');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 255)
            ->allowEmptyString('estado');

        return $validator;
    }

    public function listMunicipio() {
        $this->set('names', $this->Estados->find('list'));
      }
}
