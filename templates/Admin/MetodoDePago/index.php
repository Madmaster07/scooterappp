<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MetodoDePago> $metodoDePago
 */
?>
<div class="metodoDePago index content">
    <?= $this->Html->link(__('New Metodo De Pago'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Metodo De Pago') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('metodo') ?></th>
                    <th><?= $this->Paginator->sort('numero_tarjeta') ?></th>
                    <th><?= $this->Paginator->sort('fecha_vencimiento') ?></th>
                    <th><?= $this->Paginator->sort('cvv') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metodoDePago as $metodoDePago): ?>
                <tr>
                    <td><?= $this->Number->format($metodoDePago->id) ?></td>
                    <td><?= $metodoDePago->hasValue('user') ? $this->Html->link($metodoDePago->user->id, ['controller' => 'Users', 'action' => 'view', $metodoDePago->user->id]) : '' ?></td>
                    <td><?= h($metodoDePago->metodo) ?></td>
                    <td><?= h($metodoDePago->numero_tarjeta) ?></td>
                    <td><?= h($metodoDePago->fecha_vencimiento) ?></td>
                    <td><?= h($metodoDePago->cvv) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $metodoDePago->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $metodoDePago->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $metodoDePago->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $metodoDePago->id),
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