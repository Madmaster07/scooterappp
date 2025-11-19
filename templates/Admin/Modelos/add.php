<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Modelos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="modelos form content">
            <?= $this->Form->create($modelo) ?>
            <fieldset>
                <legend><?= __('Add Modelo') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('capacidad');
                    echo $this->Form->control('velocidad_maxima');
                    echo $this->Form->control('autonomia_km');
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
