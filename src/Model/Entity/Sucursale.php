<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sucursale Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idCliente
 * @property string|null $sucursal
 * @property string|null $cr
 * @property string|null $direccion
 * @property string|null $localidad
 * @property string|null $lada
 * @property string|null $telefono
 * @property int|null $estado
 * @property int|null $estatus
 * @property string|null $colonia
 * @property string|null $codigoPostal
 */
class Sucursale extends Entity
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
        'idCliente' => true,
        'sucursal' => true,
        'cr' => true,
        'direccion' => true,
        'colonia' => true,
        'localidad' => true,
        'codigoPostal' => true,
        'lada' => true,
        'telefono' => true,
        'estado' => true,
        'estatus' => true
    ];
}