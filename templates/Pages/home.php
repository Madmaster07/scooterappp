<?php
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScooterApp - Movilidad Eléctrica</title>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>
    <?= $this->Html->script(['https://unpkg.com/leaflet@1.9.4/dist/leaflet.js']) ?>
    <?= $this->Html->css(['https://unpkg.com/leaflet@1.9.4/dist/leaflet.css']) ?>
</head>
<body>
    <header class="header">
        <div class="container text-center">
            <img src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" alt="ScooterApp Logo" class="logo">
            <h1>ScooterApp</h1>
            <p>La forma más rápida y ecológica de moverte por tu ciudad</p>
            <div class="btn-group">
                <?php if ($this->Identity->isLoggedIn()): ?>
                    <a href="/users/view" class="btn-primary">Mi Perfil</a>
                    <a href="/pagos/index" class="btn-secondary">Mis Pagos</a>
                <?php else: ?>
                    <a href="/users/login" class="btn-primary">Iniciar Sesión</a>
                    <a href="/users/add" class="btn-secondary">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container features">
            <div class="card">
                <h3>Estaciones</h3>
                <p>Consulta todas nuestras estaciones de scooters eléctricos en la ciudad.</p>
                <div id="mapa-estaciones" style="height: 250px; margin-top: 15px;"></div>
            </div>
            <div class="card">
                <h3>Modelos</h3>
                <p>Descubre los diferentes modelos de scooters que tenemos disponibles.</p>
            </div>
            <div class="card">
                <h3>Viajes</h3>
                <p>Monitorea tus viajes y historial desde tu perfil.</p>
            </div>
        </div>

        <?php if ($this->Identity->isLoggedIn()): ?>
        <div class="container profile-container">
            <div class="profile-card">
                <h3>Aplica tu Código de Descuento</h3>
                <?= $this->Form->create(null, ['url' => ['controller' => 'Pagos', 'action' => 'aplicarCodigo']]) ?>
                    <?= $this->Form->control('codigo', [
                        'label' => 'Código de Promoción',
                        'placeholder' => 'Ingresa tu código',
                        'class' => 'input-text'
                    ]) ?>
                    <?= $this->Form->button('Aplicar Código', ['class' => 'btn-primary']) ?>
                <?= $this->Form->end() ?>

                <?php if (!empty($mensaje)): ?>
                    <p class="<?= h($mensajeColor) ?> input-text" style="font-weight: bold; margin-top: 15px;">
                        <?= h($mensaje) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </main>

    <footer class="footer text-center">
        <p>&copy; <?= date('Y') ?> ScooterApp. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mapa = L.map('mapa-estaciones').setView([19.432608, -99.133209], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(mapa);

            const estaciones = [
                {lat: 19.432608, lng: -99.133209, nombre: "Estación Centro"},
                {lat: 19.440000, lng: -99.140000, nombre: "Estación Norte"},
                {lat: 19.425000, lng: -99.120000, nombre: "Estación Sur"}
            ];

            estaciones.forEach(est => {
                L.marker([est.lat, est.lng]).addTo(mapa)
                    .bindPopup(est.nombre);
            });
        });
    </script>
</body>
</html>
