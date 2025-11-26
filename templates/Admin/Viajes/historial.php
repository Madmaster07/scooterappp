<?php
$this->disableAutoLayout();
?>
<div class="container profile-container">
    <div class="profile-card">
        <h2>Historial de Mis Viajes</h2>

        <?php if (!empty($viajes->toArray())): ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Vehículo</th>
                    <th>Duración (min)</th>
                    <th>Costo Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viajes as $viaje): ?>
                <tr>
                    <td><?= h($viaje->id) ?></td>
                    <td><?= h($viaje->fecha_inicio?->i18nFormat('dd/MM/yyyy HH:mm') ?? '-') ?></td>
                    <td><?= h($viaje->fecha_fin?->i18nFormat('dd/MM/yyyy HH:mm') ?? '-') ?></td>
                    <td><?= h($viaje->vehiculo->modelo ?? 'N/A') ?></td>
                    <td><?= h($viaje->duracion_min ?? '-') ?></td>
                    <td>$<?= h($viaje->costo_total ?? '0.00') ?></td>
                    <td><?= h(ucfirst($viaje->estado ?? 'pendiente')) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No tienes viajes registrados todavía.</p>
        <?php endif; ?>
    </div>

    <div class="profile-actions">
        <a href="/users/view" class="btn-secondary">Volver a Mi Perfil</a>
    </div>
</div>
