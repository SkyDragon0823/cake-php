<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proveedore Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $nombre
 * @property string|null $servicio
 * @property string|null $rfc
 * @property string|null $direccion
 * @property string|null $localidad
 * @property int|null $estado
 * @property int|null $pais
 * @property string|null $contacto
 * @property string|null $correo
 * @property string|null $telefono
 * @property string|null $celular
 * @property int|null $estatus
 */
class Proveedore extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'nombre' => true,
        'servicio' => true,
        'rfc' => true,
        'direccion' => true,
        'localidad' => true,
        'estado' => true,
        'pais' => true,
        'contacto' => true,
        'correo' => true,
        'telefono' => true,
        'celular' => true,
        'estatus' => true
    ];
}
