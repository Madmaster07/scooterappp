<?php
$this->disableAutoLayout();
?>
<div class="container profile-container">

    <!-- PERFIL DEL USUARIO -->
    <div class="profile-card">
        <h2>Mi Perfil</h2>
        <div class="profile-info">
            <p><strong>Nombre:</strong> <?= h($user->nombre ?? 'No definido') ?></p>
            <p><strong>Correo:</strong> <?= h($user->correo ?? 'No definido') ?></p>
            <?php if (!empty($user->telefono)): ?>
                <p><strong>Teléfono:</strong> <?= h($user->telefono) ?></p>
            <?php endif; ?>
        </div>
        <div class="profile-actions">
            <a href="/users/edit/<?= $user->id ?>" class="btn-primary">Editar Perfil</a>
            <a href="/viajes/historial" class="btn-secondary">Ver Historial de Viajes</a> <!-- Botón agregado -->
        </div>
    </div>

    <!-- MÉTODOS DE PAGO -->
    <div class="profile-card">
        <h3>Mis Métodos de Pago</h3>
        <?php if (!empty($pagos)): ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Últimos 4 Dígitos / Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagos as $pago): ?>
                <tr>
                    <td><?= h($pago->metodo) ?></td>
                    <td><?= '**** **** **** ' . substr($pago->numero_tarjeta ?? '', -4) ?></td>
                    <td>
                        <a href="/metodo-de-pago/edit/<?= $pago->id ?>" class="btn-secondary">Editar</a>
                        <a href="/metodo-de-pago/delete/<?= $pago->id ?>" class="btn-secondary"
                           onclick="return confirm('¿Eliminar método de pago?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No tienes métodos de pago registrados.</p>
        <?php endif; ?>
        <div class="profile-actions">
            <a href="/metodo-de-pago/add" class="btn-primary">Agregar Método de Pago</a>
        </div>
    </div>
</div>
