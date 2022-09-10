<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property string|null $folio
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $idCliente
 * @property int|null $clienteIndirecto
 * @property int|null $idSolicitante
 * @property int|null $idCoordinador
 * @property int|null $idSucursal
 * @property int|null $idProblemaReportado
 * @property int|null $idVehiculo
 * @property string|null $descripcion
 * @property string|null $folioApertura
 * @property string|null $folioCierre
 * @property int|null $estatus
 * @property \Cake\I18n\FrozenTime|null $fechaAtencion
 * @property int|null $slas
 * @property int|null $idTecnicoLider
 * @property int|null $idTecnicoSub
 * @property int|null $subcontrata
 */
class Ticket extends Entity
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
        'folio' => true,
        'created' => true,
        'modified' => true,
        'idCliente' => true,
        'clienteIndirecto' => true,
        'idSolicitante' => true,
        'idCoordinador' => true,
        'idSucursal' => true,
        'idProblemaReportado' => true,
        'idVehiculo' => true,
        'descripcion' => true,
        'folioApertura' => true,
        'folioCierre' => true,
        'estatus' => true,
        'fechaAtencion' => true,
        'slas' => true,
        'idTecnicoLider' => true,
        'idTecnicoSub' => true,
        'subcontrata' => true,
        'costoTecnicoSub' => true,
        'diasCredito' => true,
        'gastototal' => true,
        'costoTotal' => true
    ];
}
