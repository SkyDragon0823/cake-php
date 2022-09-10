<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tecnico Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idUsuario
 * @property string|null $nombre
 * @property string|null $apellido1
 * @property string|null $apellido2
 * @property int|null $idCliente
 * @property int|null $idProveedor
 * @property string|null $ims
 * @property string|null $ubicacion
 * @property string|null $puesto
 * @property string|null $registroImms
 * @property float|null $sueldo
 * @property string|null $domicilio
 * @property string|null $celularEmpresa
 * @property string|null $telefonoEmpresa
 * @property string|null $rfc
 * @property string|null $maxGradoEstudios
 * @property string|null $ine
 */
class Tecnico extends Entity
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
        'idUsuario' => true,
        'nombre' => true,
        'apellido1' => true,
        'apellido2' => true,
        'idCliente' => true,
        'idProveedor' => true,
        'ims' => true,
        'ubicacion' => true,
        'puesto' => true,
        'registroImms' => true,
        'sueldo' => true,
        'domicilio' => true,
        'celularEmpresa' => true,
        'telefonoEmpresa' => true,
        'rfc' => true,
        'maxGradoEstudios' => true,
        'ine' => true
    ];
}
