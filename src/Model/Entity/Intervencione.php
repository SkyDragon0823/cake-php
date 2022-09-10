<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Intervencione Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idTecnicoLider
 * @property int|null $idTicket
 * @property string|null $problemaReportado
 * @property int|null $subcontrata
 * @property int|null $estatus
 */
class Intervencione extends Entity
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
        'folio' => true,
        'slas' => true,
        'idTicket' => true,
        'idVehiculo' => true,
        'fechaAtencion' => true,
        'descripcion' => true,
        'folioApertura' => true,
        'folioCierre' => true,
        'estatus' => true,
        'idTecnicoLider' => true,
        'idSolicitante' => true,
        'subcontrata' => true,
        'idTecnicoSub' => true
    ];
}
