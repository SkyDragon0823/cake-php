<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tabulador Entity
 *
 * @property int $id
 * @property int|null $cliente
 * @property string|null $clave
 * @property string|null $descripcion
 * @property float|null $costo
 * @property float|null $precioSuministro
 * @property float|null $precioInstacion
 * @property float|null $precioDesinstalacion
 * @property int|null $subcontrata
 * @property int|null $categoria
 */
class Tabulador extends Entity
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
        'cliente' => true,
        'clave' => true,
        'descripcion' => true,
        'categoria' => true,
        'costo' => true,
        'subcontrata' => true,
        'precioSuministro' => true,
        'precioInstacion' => true,
        'precioDesinstalacion' => true
    ];
}
