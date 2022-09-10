<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table
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
        $this->setTable('usuarios');
        $this->setDisplayField(['nombre','apellido1']);
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        $this->hasOne('Estatus',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'estatus',
            'bindingKey' => 'estatus'
        ]);
        
        $this->hasOne('Tipousuario',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'tipoUsuario',
            'bindingKey' => 'tipoUsuario'
        ]);

        $this->hasOne('Tickets',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'tickets',
        ]);
        
        $this->hasOne('Reportetecnico',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'reporteTecnico'
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
            ->allowEmptyString('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('idCliente')
            ->allowEmptyString('idCliente');

        $validator
            ->scalar('username')
            ->maxLength('username', 25)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false)
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 150)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password');
        
        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 25)
            ->allowEmptyString('nombre');

        $validator
            ->scalar('apellido1')
            ->maxLength('apellido1', 25)
            ->allowEmptyString('apellido1');

        $validator
            ->scalar('apellido2')
            ->maxLength('apellido2', 25)
            ->allowEmptyString('apellido2');

        $validator
            ->scalar('puesto')
            ->maxLength('puesto', 25)
            ->allowEmptyString('puesto');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 12)
            ->allowEmptyString('telefono');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 12)
            ->allowEmptyString('celular');

        $validator
            ->scalar('correo')
            ->maxLength('correo', 50)
            ->allowEmptyString('correo');

        $validator
            ->integer('estatus')
            ->allowEmptyString('estatus');

        $validator
            ->integer('tipoUsuario')
            ->allowEmptyString('tipoUsuario');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options){
        $query
        ->select(['id','nombre','apellido1','apellido2','telefono','celular','correo','tipoUsuario','idCliente','puesto'])
        ->Where(['Users.active' => 1]);

        return $query;
    }
}
