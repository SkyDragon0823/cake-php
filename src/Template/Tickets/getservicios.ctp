<?php foreach ($serviciosTicket as $serviciosTicket): ?>
    <tr>
        <td hidden > <input type="text" name="id[]"  value="<?= $serviciosTicket->id ?>" > </td>
        <td hidden > <input type="text" name="idTicket[]"  value="<?= $serviciosTicket->idTicket ?>" > </td>
        <td> <input type="text" hidden name="idServicio[]"  value="<?= $serviciosTicket->id ?>" > <?= $serviciosTicket->idServicio->descripcion ?></td>
        <td><?= $this->Form->control('cantidad[]',['readonly' => true,'class' => 'form-control rdonly', 'label' => false,'value' => $serviciosTicket->cantidad]); ?></td>
        <td class="actions rdonlyhidde">
            <i onclick="deleteServicios(<?= $serviciosTicket->id?>)" class="far fa-trash-alt"></i>
        </td>
    </tr>
<?php endforeach; ?>