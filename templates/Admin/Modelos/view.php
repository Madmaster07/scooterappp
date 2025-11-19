<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Modelo'), ['action' => 'edit', $modelo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Modelo'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Modelos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Modelo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="modelos view content">
            <h3><?= h($modelo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($modelo->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($modelo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacidad') ?></th>
                    <td><?= $modelo->capacidad === null ? '' : $this->Number->format($modelo->capacidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Velocidad Maxima') ?></th>
                    <td><?= $modelo->velocidad_maxima === null ? '' : $this->Number->format($modelo->velocidad_maxima) ?></td>
                </tr>
                <tr>
                    <th><?= __('Autonomia Km') ?></th>
                    <td><?= $modelo->autonomia_km === null ? '' : $this->Number->format($modelo->autonomia_km) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($modelo->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Vehiculos') ?></h4>
                <?php if (!empty($modelo->vehiculos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Estacion Id') ?></th>
                            <th><?= __('Modelo Id') ?></th>
                            <th><?= __('Tipo') ?></th>
                            <th><?= __('Marca') ?></th>
                            <th><?= __('Num Serie') ?></th>
                            <th><?= __('Tarifa Minuto') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Nivel Bateria') ?></th>
                            <th><?= __('Latitud') ?></th>
                            <th><?= __('Longitud') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($modelo->vehiculos as $vehiculo) : ?>
                        <tr>
                            <td><?= h($vehiculo->id) ?></td>
                            <td><?= h($vehiculo->estacion_id) ?></td>
                            <td><?= h($vehiculo->modelo_id) ?></td>
                            <td><?= h($vehiculo->tipo) ?></td>
                            <td><?= h($vehiculo->marca) ?></td>
                            <td><?= h($vehiculo->num_serie) ?></td>
                            <td><?= h($vehiculo->tarifa_minuto) ?></td>
                            <td><?= h($vehiculo->descripcion) ?></td>
                            <td><?= h($vehiculo->estado) ?></td>
                            <td><?= h($vehiculo->nivel_bateria) ?></td>
                            <td><?= h($vehiculo->latitud) ?></td>
                            <td><?= h($vehiculo->longitud) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vehiculos', 'action' => 'view', $vehiculo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vehiculos', 'action' => 'edit', $vehiculo->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Vehiculos', 'action' => 'delete', $vehiculo->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id),
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