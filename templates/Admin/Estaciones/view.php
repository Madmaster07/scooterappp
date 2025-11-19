<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estacione $estacione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estacione'), ['action' => 'edit', $estacione->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estacione'), ['action' => 'delete', $estacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estacione->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estaciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estacione'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estaciones view content">
            <h3><?= h($estacione->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($estacione->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($estacione->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estacione->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Latitud') ?></th>
                    <td><?= $estacione->latitud === null ? '' : $this->Number->format($estacione->latitud) ?></td>
                </tr>
                <tr>
                    <th><?= __('Longitud') ?></th>
                    <td><?= $estacione->longitud === null ? '' : $this->Number->format($estacione->longitud) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>