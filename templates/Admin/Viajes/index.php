<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Viaje[]|\Cake\Collection\CollectionInterface $viajes
 */
?>
<div class="container profile-container">
    <h1 class="text-center">Historial de Viajes</h1>

    <?php if (!empty($viajes)) : ?>
        <div class="profile-card">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Distancia (km)</th>
                        <th>Costo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($viajes as $i => $viaje) : ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= h($viaje->fecha) ?></td>
                        <td><?= h($viaje->origen) ?></td>
                        <td><?= h($viaje->destino) ?></td>
                        <td><?= h($viaje->distancia) ?></td>
                        <td>$<?= h($viaje->costo) ?></td>
                        <td><?= h($viaje->estado) ?></td>
                        <td>
                            <?= $this->Html->link('Ver', ['action' => 'view', $viaje->id], ['class' => 'btn-primary']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p class="text-center">No hay viajes registrados aún.</p>
    <?php endif; ?>
</div>
