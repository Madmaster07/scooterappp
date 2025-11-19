<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pago $pago
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pago'), ['action' => 'edit', $pago->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pago'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pagos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pago'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pagos view content">
            <h3><?= h($pago->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Viaje') ?></th>
                    <td><?= $pago->hasValue('viaje') ? $this->Html->link($pago->viaje->id, ['controller' => 'Viajes', 'action' => 'view', $pago->viaje->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado Pago') ?></th>
                    <td><?= h($pago->estado_pago) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pago->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Metodo Pago Id') ?></th>
                    <td><?= $pago->metodo_pago_id === null ? '' : $this->Number->format($pago->metodo_pago_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monto') ?></th>
                    <td><?= $pago->monto === null ? '' : $this->Number->format($pago->monto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Pago') ?></th>
                    <td><?= h($pago->fecha_pago) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>