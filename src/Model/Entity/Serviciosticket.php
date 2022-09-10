<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Serviciosticket Entity
 *
 * @property int $id
 * @property int|null $idTicket
 * @property int|null $idIntervencion
 * @property int|null $idServicio
 * @property int|null $tipoServicio
 * @property float|null $cantidad
 */
class Serviciosticket extends Entity
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
        'idServicio' => true,
        'tipoServicio' => true,
        'cantidad' => true
    ];
}
