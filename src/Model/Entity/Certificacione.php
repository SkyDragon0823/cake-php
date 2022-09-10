<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Certificacione Entity
 *
 * @property int $id
 * @property string|null $certificacion
 * @property string|null $descripcion
 * @property \Cake\I18n\FrozenTime|null $fechaCertificacion
 * @property \Cake\I18n\FrozenTime|null $fechaVencimiento
 */
class Certificacione extends Entity
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
        'certificacion' => true,
        'descripcion' => true,
        'fechaCertificacion' => true,
        'fechaVencimiento' => true
    ];
}
