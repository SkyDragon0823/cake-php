<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $nombre
 * @property string $rfc
 * @property string $direccion
 * @property int $estado
 * @property int $codigoPostal
 * @property int $telefono
 * @property string $poblacion
 * @property string $protocolo
 * @property int $estatus
 */
class Cliente extends Entity
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
        'prefijo' => true,
        'rfc' => true,
        'direccion' => true,
        'estado' => true,
        'municipio' => true,
        'colonia' => true,
        'codigoPostal' => true,
        'telefono' => true,
        'protocolo' => true,
        'estatus' => true
    ];
}
