<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $userEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar Perfil'),
                ['action' => 'delete', $userEntity->id],
                ['confirm' => __('¿Estás seguro de eliminar este perfil # {0}?', $userEntity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($userEntity) ?>
            <fieldset>
                <legend><?= __('Editar Perfil') ?></legend>
                <?= $this->Form->control('nombre', ['label' => 'Nombre']) ?>
                <?= $this->Form->control('correo', ['label' => 'Correo']) ?>
                <?= $this->Form->control('telefono', ['label' => 'Teléfono']) ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar Cambios')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
