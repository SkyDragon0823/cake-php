<?php foreach ($cuadrillaTicket as $cuadrillaTicket): ?>
    <tr>
        <td><?= $cuadrillaTicket->idTecnico->nombre .' '. $cuadrillaTicket->idTecnico->apellido1 .''. $cuadrillaTicket->idTecnico->apellido2 ?></td>
        <td class="actions rdonlyhidde">
            <i onclick="deleteCuadrilla(<?= $cuadrillaTicket->id?>)" class="far fa-trash-alt"></i>
        </td>
    </tr>
<?php endforeach; ?>