<h1>Reporte de Ingresos </h1>
<p>Este es un istado de todos los pagos que se han completado</p>

<div style="border: 2px solid green; padding: 15px; margin-bottom: 20px;">
    <h2>Total Histórico de Ingresos:</h2>
    <p style="font-size: 2em; color: darkgreen;">
        <?= $this->Number->currency($totalIngresos, 'USD') ?>
    </p>
</div>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID Pago</th>
                <th>ID Viaje</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagos as $pago): ?>
            <tr>
                <td><?= $this->Number->format($pago->id) ?></td>
                <td><?= $this->Html->link($pago->viaje_id, ['controller' => 'Viajes', 'action' => 'view', $pago->viaje_id]) ?></td>
                <td><?= $this->Number->currency($pago->monto, 'USD') ?></td>
                <td><?= h($pago->fecha_pago) ?></td>