<?php
/**
 * Vista para aplicar código de descuento
 * @var \App\View\AppView $this
 */
?>
<div class="container profile-container">
    <h1 class="text-center">Aplicar Código de Descuento</h1>

    <?= $this->Form->create(null, ['url' => ['action' => 'aplicarCodigo'], 'class' => 'profile-card']) ?>
        <fieldset>
            <?= $this->Form->control('codigo', [
                'label' => 'Ingrese su código de descuento',
                'placeholder' => 'Ej: SCOOTER10',
                'required' => true
            ]) ?>
        </fieldset>
        <div class="profile-actions text-center">
            <?= $this->Form->button(__('Aplicar'), ['class' => 'btn-primary']) ?>
        </div>
    <?= $this->Form->end() ?>

    <?php if (isset($mensaje)) : ?>
        <p class="text-center" style="margin-top: 15px; color: <?= $mensajeColor ?? 'green' ?>; font-weight: bold;">
            <?= h($mensaje) ?>
        </p>
    <?php endif; ?>

    <div class="text-center" style="margin-top: 20px;">
        <?= $this->Html->link('Volver a Pagos', ['action' => 'index'], ['class' => 'btn-secondary']) ?>
    </div>
</div>
