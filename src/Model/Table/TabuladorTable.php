<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tabulador Model
 *
 * @method \App\Model\Entity\Tabulador get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tabulador newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tabulador[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tabulador|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tabulador saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tabulador patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tabulador[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tabulador findOrCreate($search, callable $callback = null, $options = [])
 */
class TabuladorTable extends Table
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

        $this->setTable('tabulador');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->hasOne('Clientes',[
            'foreignKey' => 'id',
            'className' => 'clientes',
            'propertyName' => 'cliente',
            'bindingKey' => 'cliente'
        ]);

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
            ->integer('cliente')
            ->allowEmptyString('cliente');

        $validator
            ->scalar('clave')
            ->maxLength('clave', 20)
            ->allowEmptyString('clave');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 500)
            ->allowEmptyString('descripcion');

        $validator
            ->decimal('costo')
            ->allowEmptyString('costo');

        $validator
            ->decimal('precioSuministro')
            ->allowEmptyString('precioSuministro');

        $validator
            ->decimal('precioInstacion')
            ->allowEmptyString('precioInstacion');

        $validator
            ->decimal('precioDesinstalacion')
            ->allowEmptyString('precioDesinstalacion');

        $validator
            ->allowEmptyString('subcontrata');

        $validator
            ->integer('categoria')
            ->allowEmptyString('categoria');

        return $validator;
    }
}
