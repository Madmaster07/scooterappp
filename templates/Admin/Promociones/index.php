<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promocione> $promociones
 */
?>
<div class="promociones index content">
    <?= $this->Html->link(__('New Promocione'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Promociones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('porcentaje_descuento') ?></th>
                    <th><?= $this->Paginator->sort('fecha_inicio') ?></th>
                    <th><?= $this->Paginator->sort('fecha_fin') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promociones as $promocione): ?>
                <tr>
                    <td><?= $this->Number->format($promocione->id) ?></td>
                    <td><?= h($promocione->codigo) ?></td>
                    <td><?= $promocione->porcentaje_descuento === null ? '' : $this->Number->format($promocione->porcentaje_descuento) ?></td>
                    <td><?= h($promocione->fecha_inicio) ?></td>
                    <td><?= h($promocione->fecha_fin) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $promocione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promocione->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $promocione->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $promocione->id),
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