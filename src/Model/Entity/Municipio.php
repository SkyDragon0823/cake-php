<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Municipio Entity
 *
 * @property int $id_municipio
 * @property string $nombre_municipio
 * @property int|null $estado
 */
class Municipio extends Entity
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
        'nombre_municipio' => true,
        'estado' => true
    ];
}
