<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conceptoscobro Entity
 *
 * @property int $idOrdenCompra
 * @property int|null $cantidad
 * @property string|null $marca
 * @property string|null $modelo
 * @property string|null $descripcion
 * @property int|null $idProveedor
 * @property float|null $precio
 */
class Conceptoscobro extends Entity
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
        'cantidad' => true,
        'marca' => true,
        'modelo' => true,
        'descripcion' => true,
        'idProveedor' => true,
        'precio' => true
    ];
}
