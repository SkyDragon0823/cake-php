<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Serviciosticket Model
 *
 * @method \App\Model\Entity\Serviciosticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Serviciosticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Serviciosticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Serviciosticket saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Serviciosticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosticket findOrCreate($search, callable $callback = null, $options = [])
 */
class ServiciosticketTable extends Table
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

        $this->setTable('serviciosticket');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasOne('Tabulador',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'idServicio',
            'bindingKey' => 'idServicio'
        ]);

        $this->hasOne('Tiposervicio',[
            'foreignKey' => 'id',
            'jointype' => 'INNER',
            'propertyName' => 'tipoServicio',
            'bindingKey' => 'tipoServicio'
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
            ->allowEmptyString('idTicket');
        
        $validator
            ->allowEmptyString('idIntervencion');

        $validator
            ->integer('idServicio')
            ->allowEmptyString('idServicio');

        $validator
            ->integer('tipoServicio')
            ->allowEmptyString('tipoServicio');

        $validator
            ->decimal('cantidad')
            ->allowEmptyString('cantidad');

        return $validator;
    }
}
