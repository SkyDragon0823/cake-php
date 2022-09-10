<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reportetecnico Entity
 *
 * @property int $id
 * @property int|null $idTicket
 * @property int|null $idIntervencion
 * @property \Cake\I18n\FrozenTime|null $fechaAtencion
 * @property string|null $descripcionReporte
 * @property string|null $comprobanteReporte
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idUsuario
 */
class Reportetecnico extends Entity
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
        'fechaAtencion' => true,
        'descripcionReporte' => true,
        'comprobanteReporte' => true,
        'created' => true,
        'modified' => true,
        'idUsuario' => true
    ];
}