<?php
// Renderiza mensajes de error si los hay
echo $this->Flash->render();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h3 class="card-title text-center mb-4">Administrador</h3>
        <?= $this->Form->create(null, ['class' => 'needs-validation', 'novalidate' => true]) ?>
            <div class="mb-3">
                <?= $this->Form->control('username', [
                    'label' => 'Usuario',
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => 'Ingresa tu usuario'
                ]) ?>
            </div>
            <div class="mb-3">
                <?= $this->Form->control('password', [
                    'label' => 'Contraseña',
                    'class' => 'form-control',
                    'required' => true,
                    'placeholder' => 'Ingresa tu contraseña'
                ]) ?>
            </div>
            <div class="d-grid">
                <?= $this->Form->button(__('Ingresar'), ['class' => 'btn btn-primary']) ?>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
