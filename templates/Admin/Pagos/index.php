<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pago> $pagos
 */
?>
<div class="pagos index content">
    <?= $this->Html->link('Agregar Pago', ['action' => 'add'], ['class' => 'btn-primary float-right']) ?>
    <h3>Pagos</h3>

    <div class="table-responsive">
        <table class="styled-table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('viaje_id', 'Viaje') ?></th>
                    <th><?= $this->Paginator->sort('metodo_pago_id', 'Método') ?></th>
                    <th><?= $this->Paginator->sort('monto') ?></th>
                    <th><?= $this->Paginator->sort('fecha_pago') ?></th>
                    <th><?= $this->Paginator->sort('estado_pago') ?></th>
                    <th class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagos as $pago): ?>
                <tr>
                    <td><?= $this->Number->format($pago->id) ?></td>
                    <td>
                        <?= $pago->has('viaje') 
                            ? $this->Html->link($pago->viaje->id, ['controller' => 'Viajes', 'action' => 'view', $pago->viaje->id]) 
                            : '' 
                        ?>
                    </td>
                    <td><?= $pago->has('metodo_pago') ? h($pago->metodo_pago->metodo) : '' ?></td>
                    <td><?= $pago->monto !== null ? $this->Number->format($pago->monto) : '' ?></td>
                    <td><?= h($pago->fecha_pago) ?></td>
                    <td><?= h($pago->estado_pago) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Ver', ['action' => 'view', $pago->id], ['class' => 'btn-secondary']) ?>
                        <?= $this->Html->link('Editar', ['action' => 'edit', $pago->id], ['class' => 'btn-secondary']) ?>
                        <?= $this->Form->postLink(
                            'Eliminar',
                            ['action' => 'delete', $pago->id],
                            [
                                'confirm' => "¿Eliminar el pago #{$pago->id}?",
                                'class' => 'btn-secondary'
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< Primero') ?>
            <?= $this->Paginator->prev('< Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Siguiente >') ?>
            <?= $this->Paginator->last('Último >>') ?>
        </ul>
        <p><?= $this->Paginator->counter('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} pagos') ?></p>
    </div>
</div>
