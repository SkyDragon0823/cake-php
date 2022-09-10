<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiculo Entity
 *
 * @property int $id
 * @property string|null $marca
 * @property string|null $modelo
 * @property string|null $placa
 * @property int|null $idRastreador
 */
class Vehiculo extends Entity
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
        'marca' => true,
        'modelo' => true,
        'placa' => true,
        'idRastreador' => true
    ];
}
