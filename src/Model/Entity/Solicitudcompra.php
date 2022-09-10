<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Solicitudcompra Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idTicket
 * @property string|null $solicitante
 * @property string|null $departamento
 * @property string|null $lugarEntrega
 * @property string|null $responsable
 */
class Solicitudcompra extends Entity
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
        'responsable' => true
    ];
}
