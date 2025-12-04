<h1>Listado de Viajes por Cliente </h1>
<p>Detalles de todos lo viajes realizados, con el costo y a que usuario esta asociado.</p>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID Viaje</th>
                <th>Cliente</th>
                <th>Vehículo (Marca/Modelo)</th>
                <th>Inició</th>
                <th>Duración (min)</th>
                <th>Costo Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viajes as $viaje): ?>
            <tr>
                <td><?= $this->Number->format($viaje->id) ?></td>
                
                <td><?= h($viaje->user->nombre . ' ' . $viaje->user->apellidos) ?></td> 
                
                <td><?= h($viaje->vehiculo->marca . ' / ' . $viaje->vehiculo->num_serie) ?></td> 
                
                <td><?= h($viaje->fecha_inicio) ?></td>
                <td><?= $this->Number->format($viaje->duracion_min) ?></td>
                
                <td><?= $this->Number->currency($viaje->costo_total, 'USD') ?></td> 
                
                <td><?= h($viaje->estado) ?></td>
