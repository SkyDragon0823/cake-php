<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reportetecnico Model
 *
 * @method \App\Model\Entity\Reportetecnico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reportetecnico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reportetecnico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reportetecnico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reportetecnico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reportetecnico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reportetecnico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reportetecnico findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportetecnicoTable extends Table
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

        $this->setTable('reportetecnico');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Usuarios',[
            'foreignKey' => 'id',
            'propertyName' => 'idUsuario',
            'bindingKey' => 'idUsuario'
        ]);
        $this->hasOne('Tickets',[
            'foreignKey' => 'id',
            'propertyName' => 'idTicket',
            'bindingKey' => 'idTicket'
        ]);
        $this->hasOne('Intervenciones',[
            'foreignKey' => 'id',
            'propertyName' => 'idIntervencion',
            'bindingKey' => 'idIntervencion'
        ]);
        // $this->addBehavior('Proffer.Proffer', [
        //     'photo' => [	// The name of your upload field
        //         'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        //         'dir' => 'photo_dir',	// The name of the field to store the folder
        //         'thumbnailSizes' => [ // Declare your thumbnails
        //             'square' => [	// Define the prefix of your thumbnail
        //                 'w' => 200,	// Width
        //                 'h' => 200,	// Height
        //                 'jpeg_quality'	=> 100
        //             ],
        //             'portrait' => [		// Define a second thumbnail
        //                 'w' => 100,
        //                 'h' => 300
        //             ],
        //         ],
        //         'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
        //     ]
        // ]);
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
            ->dateTime('fechaAtencion')
            ->allowEmptyDateTime('fechaAtencion');

        $validator
            ->scalar('descripcionReporte')
            ->maxLength('descripcionReporte', 500)
            ->allowEmptyString('descripcionReporte');

        $validator
            ->scalar('comprobanteReporte')
            ->maxLength('comprobanteReporte', 500)
            ->allowEmptyString('comprobanteReporte');

        $validator
            ->integer('idUsuario')
            ->allowEmptyString('idUsuario');

        return $validator;
    }
}
