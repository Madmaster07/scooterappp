<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Viaje $viaje
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Viaje'), ['action' => 'edit', $viaje->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Viaje'), ['action' => 'delete', $viaje->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viaje->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Viajes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Viaje'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="viajes view content">
            <h3><?= h($viaje->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $viaje->hasValue('user') ? $this->Html->link($viaje->user->id, ['controller' => 'Users', 'action' => 'view', $viaje->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehiculo') ?></th>
                    <td><?= $viaje->hasValue('vehiculo') ? $this->Html->link($viaje->vehiculo->id, ['controller' => 'Vehiculos', 'action' => 'view', $viaje->vehiculo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($viaje->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($viaje->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estacion Id') ?></th>
                    <td><?= $viaje->estacion_id === null ? '' : $this->Number->format($viaje->estacion_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Metodo Pago Id') ?></th>
                    <td><?= $viaje->metodo_pago_id === null ? '' : $this->Number->format($viaje->metodo_pago_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Promocion Id') ?></th>
                    <td><?= $viaje->promocion_id === null ? '' : $this->Number->format($viaje->promocion_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duracion Min') ?></th>
                    <td><?= $viaje->duracion_min === null ? '' : $this->Number->format($viaje->duracion_min) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Total') ?></th>
                    <td><?= $viaje->costo_total === null ? '' : $this->Number->format($viaje->costo_total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Inicio') ?></th>
                    <td><?= h($viaje->fecha_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Fin') ?></th>
                    <td><?= h($viaje->fecha_fin) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pagos') ?></h4>
                <?php if (!empty($viaje->pagos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Viaje Id') ?></th>
                            <th><?= __('Metodo Pago Id') ?></th>
                            <th><?= __('Monto') ?></th>
                            <th><?= __('Fecha Pago') ?></th>
                            <th><?= __('Estado Pago') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($viaje->pagos as $pago) : ?>
                        <tr>
                            <td><?= h($pago->id) ?></td>
                            <td><?= h($pago->viaje_id) ?></td>
                            <td><?= h($pago->metodo_pago_id) ?></td>
                            <td><?= h($pago->monto) ?></td>
                            <td><?= h($pago->fecha_pago) ?></td>
                            <td><?= h($pago->estado_pago) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Pagos', 'action' => 'view', $pago->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Pagos', 'action' => 'edit', $pago->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Pagos', 'action' => 'delete', $pago->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $pago->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>