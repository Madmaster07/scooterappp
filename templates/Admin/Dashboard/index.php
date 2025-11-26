<h1>Dashboard Operacional</h1>
<p>Resumen de las métricas clave del sistema de movilidad.</p>

<div style="display: flex; gap: 20px; margin-bottom: 40px;">

    <div style="border: 1px solid #ccc; padding: 20px; flex: 1;">
        <h2>Ingresos Hoy</h2>
        <p style="font-size: 2em; color: green;">
            <?= $this->Number->currency($ingresosHoy, 'USD') ?>
        </p>
    </div>

    <div style="border: 1px solid #ccc; padding: 20px; flex: 1;">
        <h2>Viajes Hoy</h2>
        <p style="font-size: 2em; color: blue;">
            <?= $this->Number->format($viajesHoy) ?>
        </p>
        <p>Total de viajes registrados: <?= $this->Number->format($viajesTotales) ?></p>
    </div>

</div>

<h2>Estado de la Flota (<?= $totalVehiculos ?> Scooters)</h2>
<hr>

<div style="display: flex; gap: 20px;">
    <div style="border: 1px solid #ccc; padding: 20px; flex: 1; background-color: #e6ffe6;">
        <h3>Disponibles</h3>
        <p style="font-size: 1.5em; color: darkgreen;"><?= $this->Number->format($disponibles) ?></p>
    </div>

    <div style="border: 1px solid #ccc; padding: 20px; flex: 1; background-color: #fff0cc;">
        <h3>🛵 En Uso</h3>
        <p style="font-size: 1.5em; color: orange;"><?= $this->Number->format($enUso) ?></p>
    </div>

    <div style="border: 1px solid #ccc; padding: 20px; flex: 1; background-color: #ffe6e6;">
        <h3>🛠️ Mantenimiento</h3>
        <p style="font-size: 1.5em; color: red;"><?= $this->Number->format($mantenimiento) ?></p>
    </div>
</div>