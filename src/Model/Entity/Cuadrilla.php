<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cuadrilla Entity
 *
 * @property int $id
 * @property int|null $idTecnico
 * @property int|null $idTicket
 * @property int|null $idIntervencion
 */
class Cuadrilla extends Entity
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
        'idTecnico' => true,
        'idTicket' => true,
        'idIntervencion' => true
    ];
}
