<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gasto Entity
 *
 * @property int $id
 * @property int|null $idTicket
 * @property int|null $idIntervencion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $tiposGasto
 * @property string|null $conceptoGasto
 * @property string|null $UIDFactura
 * @property float|null $montoSinIva
 * @property float|null $montoTotal
 * @property string|null $detalles
 * @property int|null $deducible
 */
class Gasto extends Entity
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
        'idTicket' => true,
        'idIntervencion' => true,
        'created' => true,
        'modified' => true,
        'tiposGasto' => true,
        'conceptoGasto' => true,
        'UIDFactura' => true,
        'montoSinIva' => true,
        'montoTotal' => true,
        'detalles' => true,
        'deducible' => true
    ];
}
