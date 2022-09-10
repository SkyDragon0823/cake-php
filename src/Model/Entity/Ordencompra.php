<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ordencompra Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idTicket
 * @property string|null $nombre
 * @property string|null $lugarEntrega
 * @property string|null $responsable
 * @property int|null $tipoOrden
 */
class Ordencompra extends Entity
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
        'idTicket' => true,
        'solicitante' => true,
        'departamento' => true,
        'lugarEntrega' => true,
        'responsable' => true,
        'total' => true
    ];
}
