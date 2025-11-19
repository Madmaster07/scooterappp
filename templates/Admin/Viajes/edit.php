<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Viaje $viaje
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $vehiculos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $viaje->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $viaje->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Viajes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="viajes form content">
            <?= $this->Form->create($viaje) ?>
            <fieldset>
                <legend><?= __('Edit Viaje') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('vehiculo_id', ['options' => $vehiculos, 'empty' => true]);
                    echo $this->Form->control('estacion_id');
                    echo $this->Form->control('metodo_pago_id');
                    echo $this->Form->control('promocion_id');
                    echo $this->Form->control('fecha_inicio', ['empty' => true]);
                    echo $this->Form->control('fecha_fin', ['empty' => true]);
                    echo $this->Form->control('duracion_min');
                    echo $this->Form->control('costo_total');
                    echo $this->Form->control('estado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
