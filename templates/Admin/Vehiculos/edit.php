<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 * @var string[]|\Cake\Collection\CollectionInterface $modelos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehiculo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vehiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehiculos form content">
            <?= $this->Form->create($vehiculo) ?>
            <fieldset>
                <legend><?= __('Edit Vehiculo') ?></legend>
                <?php
                    echo $this->Form->control('estacion_id');
                    echo $this->Form->control('modelo_id', ['options' => $modelos, 'empty' => true]);
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('marca');
                    echo $this->Form->control('num_serie');
                    echo $this->Form->control('tarifa_minuto');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('estado');
                    echo $this->Form->control('nivel_bateria');
                    echo $this->Form->control('latitud');
                    echo $this->Form->control('longitud');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
