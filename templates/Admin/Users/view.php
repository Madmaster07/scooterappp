<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol') ?></th>
                    <td><?= h($user->rol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($user->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellidos') ?></th>
                    <td><?= h($user->apellidos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($user->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($user->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sexo') ?></th>
                    <td><?= h($user->sexo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha De Registro') ?></th>
                    <td><?= h($user->fecha_de_registro) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Metodo De Pago') ?></h4>
                <?php if (!empty($user->metodo_de_pago)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Metodo') ?></th>
                            <th><?= __('Numero Tarjeta') ?></th>
                            <th><?= __('Fecha Vencimiento') ?></th>
                            <th><?= __('Cvv') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->metodo_de_pago as $metodoDePago) : ?>
                        <tr>
                            <td><?= h($metodoDePago->id) ?></td>
                            <td><?= h($metodoDePago->user_id) ?></td>
                            <td><?= h($metodoDePago->metodo) ?></td>
                            <td><?= h($metodoDePago->numero_tarjeta) ?></td>
                            <td><?= h($metodoDePago->fecha_vencimiento) ?></td>
                            <td><?= h($metodoDePago->cvv) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MetodoDePago', 'action' => 'view', $metodoDePago->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MetodoDePago', 'action' => 'edit', $metodoDePago->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'MetodoDePago', 'action' => 'delete', $metodoDePago->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $metodoDePago->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Viajes') ?></h4>
                <?php if (!empty($user->viajes)) : ?>
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
                        <?php foreach ($user->viajes as $viaje) : ?>
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