<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pago> $pagos
 */
?>
<div class="pagos index content">
    <?= $this->Html->link(__('New Pago'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pagos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('viaje_id') ?></th>
                    <th><?= $this->Paginator->sort('metodo_pago_id') ?></th>
                    <th><?= $this->Paginator->sort('monto') ?></th>
                    <th><?= $this->Paginator->sort('fecha_pago') ?></th>
                    <th><?= $this->Paginator->sort('estado_pago') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagos as $pago): ?>
                <tr>
                    <td><?= $this->Number->format($pago->id) ?></td>
                    <td><?= $pago->hasValue('viaje') ? $this->Html->link($pago->viaje->id, ['controller' => 'Viajes', 'action' => 'view', $pago->viaje->id]) : '' ?></td>
                    <td><?= $pago->metodo_pago_id === null ? '' : $this->Number->format($pago->metodo_pago_id) ?></td>
                    <td><?= $pago->monto === null ? '' : $this->Number->format($pago->monto) ?></td>
                    <td><?= h($pago->fecha_pago) ?></td>
                    <td><?= h($pago->estado_pago) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pago->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pago->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $pago->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $pago->id),
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