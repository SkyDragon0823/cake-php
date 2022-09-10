<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $apellido1
 * @property string $apellido2
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property string $puesto
 * @property int $estatus
 * @property int $tipoUsuario
 */
class Usuario extends Entity
{
    public $useTable = 'usuarios';
   // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
