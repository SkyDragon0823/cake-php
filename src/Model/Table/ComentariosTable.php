<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comentarios Model
 *
 * @method \App\Model\Entity\Comentario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comentario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comentario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comentario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comentario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comentario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comentario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comentario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComentariosTable extends Table
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

        $this->setTable('comentarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Usuarios',[
            'classname' => 'autor',
            'foreignKey' => 'id',
            'propertyName' => 'autor',
            'bindingKey' => 'autor'
        ]);
        $this->hasOne('Tickets',[
            'classname' => 'autor',
            'foreignKey' => 'id',
            'propertyName' => 'idTicket',
            'bindingKey' => 'idTicket'
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
            ->requirePresence('idTicket', 'create')
            ->allowEmptyString('idTicket', false);

        $validator
            ->integer('autor')
            ->allowEmptyString('autor');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 50)
            ->allowEmptyString('titulo');

        $validator
            ->scalar('comentario')
            ->maxLength('comentario', 500)
            ->allowEmptyString('comentario');

        return $validator;
    }
}
