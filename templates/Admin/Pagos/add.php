<div class="profile-card">
    <h3 class="text-center">Aplicar Código de Descuento</h3>

    <?= $this->Form->create(null, ['url' => ['controller' => 'Pagos', 'action' => 'aplicarCodigo'], 'class' => 'profile-card']) ?>
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
        <p class="text-center" style="margin-top: 15px; color: <?= $mensajeColor ?? 'green' ?>;">
            <?= h($mensaje) ?>
        </p>
    <?php endif; ?>
</div>
