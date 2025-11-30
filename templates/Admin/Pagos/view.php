<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pago $pago
 */
?>
<div class="container profile-container">
    <h1 class="text-center">Detalle del Método de Pago</h1>

    <div class="profile-card">
        <div class="profile-info">
            <p><strong>Nombre del Titular:</strong> <?= h($pago->name) ?></p>
            <p><strong>Número de Tarjeta:</strong> <?= h($pago->card_number) ?></p>
            <p><strong>Fecha de Expiración:</strong> <?= h($pago->expiry_date) ?></p>
            <p><strong>CVV:</strong> <?= h($pago->cvv) ?></p>
            <p><strong>Tipo de Pago:</strong> <?= h($pago->tipo) ?></p>
        </div>

        <div class="profile-actions text-center">
            <?= $this->Html->link('Editar', ['action' => 'edit', $pago->id], ['class' => 'btn-primary']) ?>
            <?= $this->Html->link('Volver', ['action' => 'index'], ['class' => 'btn-secondary']) ?>
        </div>
    </div>
</div>
