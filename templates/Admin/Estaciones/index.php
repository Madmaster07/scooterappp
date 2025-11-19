<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Estacione> $estaciones
 */
?>
<div class="estaciones index content">
    <?= $this->Html->link(__('New Estacione'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Estaciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('latitud') ?></th>
                    <th><?= $this->Paginator->sort('longitud') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estaciones as $estacione): ?>
                <tr>
                    <td><?= $this->Number->format($estacione->id) ?></td>
                    <td><?= h($estacione->nombre) ?></td>
                    <td><?= h($estacione->direccion) ?></td>
                    <td><?= $estacione->latitud === null ? '' : $this->Number->format($estacione->latitud) ?></td>
                    <td><?= $estacione->longitud === null ? '' : $this->Number->format($estacione->longitud) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $estacione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estacione->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $estacione->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $estacione->id),
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>