<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promocione $promocione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Promocione'), ['action' => 'edit', $promocione->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Promocione'), ['action' => 'delete', $promocione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promocione->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Promociones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Promocione'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="promociones view content">
            <h3><?= h($promocione->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= h($promocione->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($promocione->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Porcentaje Descuento') ?></th>
                    <td><?= $promocione->porcentaje_descuento === null ? '' : $this->Number->format($promocione->porcentaje_descuento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Inicio') ?></th>
                    <td><?= h($promocione->fecha_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Fin') ?></th>
                    <td><?= h($promocione->fecha_fin) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($promocione->descripcion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>