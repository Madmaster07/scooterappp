<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehiculo> $vehiculos
 */
?>
<div class="vehiculos index content">
    <?= $this->Html->link(__('New Vehiculo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vehiculos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('estacion_id') ?></th>
                    <th><?= $this->Paginator->sort('modelo_id') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>
                    <th><?= $this->Paginator->sort('num_serie') ?></th>
                    <th><?= $this->Paginator->sort('tarifa_minuto') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('nivel_bateria') ?></th>
                    <th><?= $this->Paginator->sort('latitud') ?></th>
                    <th><?= $this->Paginator->sort('longitud') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $vehiculo): ?>
                <tr>
                    <td><?= $this->Number->format($vehiculo->id) ?></td>
                    <td><?= $vehiculo->estacion_id === null ? '' : $this->Number->format($vehiculo->estacion_id) ?></td>
                    <td><?= $vehiculo->hasValue('modelo') ? $this->Html->link($vehiculo->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $vehiculo->modelo->id]) : '' ?></td>
                    <td><?= h($vehiculo->tipo) ?></td>
                    <td><?= h($vehiculo->marca) ?></td>
                    <td><?= h($vehiculo->num_serie) ?></td>
                    <td><?= $vehiculo->tarifa_minuto === null ? '' : $this->Number->format($vehiculo->tarifa_minuto) ?></td>
                    <td><?= h($vehiculo->estado) ?></td>
                    <td><?= $vehiculo->nivel_bateria === null ? '' : $this->Number->format($vehiculo->nivel_bateria) ?></td>
                    <td><?= $vehiculo->latitud === null ? '' : $this->Number->format($vehiculo->latitud) ?></td>
                    <td><?= $vehiculo->longitud === null ? '' : $this->Number->format($vehiculo->longitud) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vehiculo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiculo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $vehiculo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id),
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