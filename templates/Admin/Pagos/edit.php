<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pago $pago
 */
?>
<div class="container profile-container">
    <h1 class="text-center">Editar Método de Pago</h1>

    <?= $this->Form->create($pago, ['class' => 'profile-card']) ?>
        <fieldset>
            <legend>Actualizar Información</legend>
            <?= $this->Form->control('name', ['label' => 'Nombre del Titular', 'required' => true]) ?>
            <?= $this->Form->control('card_number', ['label' => 'Número de Tarjeta', 'required' => true]) ?>
            <?= $this->Form->control('expiry_date', ['label' => 'Fecha de Expiración', 'type' => 'date', 'required' => true]) ?>
            <?= $this->Form->control('cvv', ['label' => 'CVV', 'required' => true]) ?>
            <?= $this->Form->control('tipo', ['label' => 'Tipo de Pago', 'options' => ['Tarjeta' => 'Tarjeta', 'PayPal' => 'PayPal'], 'empty' => 'Seleccione', 'required' => true]) ?>
        </fieldset>
        <div class="profile-actions text-center">
            <?= $this->Form->button(__('Actualizar'), ['class' => 'btn-primary']) ?>
            <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn-secondary']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
