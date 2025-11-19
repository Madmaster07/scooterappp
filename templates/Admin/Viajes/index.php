<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Viaje> $viajes
 */
?>
<div class="viajes index content">
    <?= $this->Html->link(__('New Viaje'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Viajes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('vehiculo_id') ?></th>
                    <th><?= $this->Paginator->sort('estacion_id') ?></th>
                    <th><?= $this->Paginator->sort('metodo_pago_id') ?></th>
                    <th><?= $this->Paginator->sort('promocion_id') ?></th>
                    <th><?= $this->Paginator->sort('fecha_inicio') ?></th>
                    <th><?= $this->Paginator->sort('fecha_fin') ?></th>
                    <th><?= $this->Paginator->sort('duracion_min') ?></th>
                    <th><?= $this->Paginator->sort('costo_total') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viajes as $viaje): ?>
                <tr>
                    <td><?= $this->Number->format($viaje->id) ?></td>
                    <td><?= $viaje->hasValue('user') ? $this->Html->link($viaje->user->id, ['controller' => 'Users', 'action' => 'view', $viaje->user->id]) : '' ?></td>
                    <td><?= $viaje->hasValue('vehiculo') ? $this->Html->link($viaje->vehiculo->id, ['controller' => 'Vehiculos', 'action' => 'view', $viaje->vehiculo->id]) : '' ?></td>
                    <td><?= $viaje->estacion_id === null ? '' : $this->Number->format($viaje->estacion_id) ?></td>
                    <td><?= $viaje->metodo_pago_id === null ? '' : $this->Number->format($viaje->metodo_pago_id) ?></td>
                    <td><?= $viaje->promocion_id === null ? '' : $this->Number->format($viaje->promocion_id) ?></td>
                    <td><?= h($viaje->fecha_inicio) ?></td>
                    <td><?= h($viaje->fecha_fin) ?></td>
                    <td><?= $viaje->duracion_min === null ? '' : $this->Number->format($viaje->duracion_min) ?></td>
                    <td><?= $viaje->costo_total === null ? '' : $this->Number->format($viaje->costo_total) ?></td>
                    <td><?= h($viaje->estado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $viaje->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $viaje->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $viaje->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $viaje->id),
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