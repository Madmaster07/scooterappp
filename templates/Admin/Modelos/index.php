<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Modelo> $modelos
 */
?>
<div class="modelos index content">
    <?= $this->Html->link(__('New Modelo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Modelos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('capacidad') ?></th>
                    <th><?= $this->Paginator->sort('velocidad_maxima') ?></th>
                    <th><?= $this->Paginator->sort('autonomia_km') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modelos as $modelo): ?>
                <tr>
                    <td><?= $this->Number->format($modelo->id) ?></td>
                    <td><?= h($modelo->nombre) ?></td>
                    <td><?= $modelo->capacidad === null ? '' : $this->Number->format($modelo->capacidad) ?></td>
                    <td><?= $modelo->velocidad_maxima === null ? '' : $this->Number->format($modelo->velocidad_maxima) ?></td>
                    <td><?= $modelo->autonomia_km === null ? '' : $this->Number->format($modelo->autonomia_km) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $modelo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modelo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $modelo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $modelo->id),
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