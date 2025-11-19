<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vehiculo'), ['action' => 'edit', $vehiculo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vehiculo'), ['action' => 'delete', $vehiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vehiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vehiculo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehiculos view content">
            <h3><?= h($vehiculo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Modelo') ?></th>
                    <td><?= $vehiculo->hasValue('modelo') ? $this->Html->link($vehiculo->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $vehiculo->modelo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($vehiculo->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= h($vehiculo->marca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Serie') ?></th>
                    <td><?= h($vehiculo->num_serie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($vehiculo->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vehiculo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estacion Id') ?></th>
                    <td><?= $vehiculo->estacion_id === null ? '' : $this->Number->format($vehiculo->estacion_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tarifa Minuto') ?></th>
                    <td><?= $vehiculo->tarifa_minuto === null ? '' : $this->Number->format($vehiculo->tarifa_minuto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nivel Bateria') ?></th>
                    <td><?= $vehiculo->nivel_bateria === null ? '' : $this->Number->format($vehiculo->nivel_bateria) ?></td>
                </tr>
                <tr>
                    <th><?= __('Latitud') ?></th>
                    <td><?= $vehiculo->latitud === null ? '' : $this->Number->format($vehiculo->latitud) ?></td>
                </tr>
                <tr>
                    <th><?= __('Longitud') ?></th>
                    <td><?= $vehiculo->longitud === null ? '' : $this->Number->format($vehiculo->longitud) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($vehiculo->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Viajes') ?></h4>
                <?php if (!empty($vehiculo->viajes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Vehiculo Id') ?></th>
                            <th><?= __('Estacion Id') ?></th>
                            <th><?= __('Metodo Pago Id') ?></th>
                            <th><?= __('Promocion Id') ?></th>
                            <th><?= __('Fecha Inicio') ?></th>
                            <th><?= __('Fecha Fin') ?></th>
                            <th><?= __('Duracion Min') ?></th>
                            <th><?= __('Costo Total') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($vehiculo->viajes as $viaje) : ?>
                        <tr>
                            <td><?= h($viaje->id) ?></td>
                            <td><?= h($viaje->user_id) ?></td>
                            <td><?= h($viaje->vehiculo_id) ?></td>
                            <td><?= h($viaje->estacion_id) ?></td>
                            <td><?= h($viaje->metodo_pago_id) ?></td>
                            <td><?= h($viaje->promocion_id) ?></td>
                            <td><?= h($viaje->fecha_inicio) ?></td>
                            <td><?= h($viaje->fecha_fin) ?></td>
                            <td><?= h($viaje->duracion_min) ?></td>
                            <td><?= h($viaje->costo_total) ?></td>
                            <td><?= h($viaje->estado) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Viajes', 'action' => 'view', $viaje->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Viajes', 'action' => 'edit', $viaje->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Viajes', 'action' => 'delete', $viaje->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $viaje->id),
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