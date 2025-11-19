<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetodoDePago $metodoDePago
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Metodo De Pago'), ['action' => 'edit', $metodoDePago->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Metodo De Pago'), ['action' => 'delete', $metodoDePago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metodoDePago->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Metodo De Pago'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Metodo De Pago'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="metodoDePago view content">
            <h3><?= h($metodoDePago->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->id, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Metodo') ?></th>
                    <td><?= h($metodoDePago->metodo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Tarjeta') ?></th>
                    <td><?= h($metodoDePago->numero_tarjeta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cvv') ?></th>
                    <td><?= h($metodoDePago->cvv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($metodoDePago->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Vencimiento') ?></th>
                    <td><?= h($metodoDePago->fecha_vencimiento) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>