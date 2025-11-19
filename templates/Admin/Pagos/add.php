<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pago $pago
 * @var \Cake\Collection\CollectionInterface|string[] $viajes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pagos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pagos form content">
            <?= $this->Form->create($pago) ?>
            <fieldset>
                <legend><?= __('Add Pago') ?></legend>
                <?php
                    echo $this->Form->control('viaje_id', ['options' => $viajes, 'empty' => true]);
                    echo $this->Form->control('metodo_pago_id');
                    echo $this->Form->control('monto');
                    echo $this->Form->control('fecha_pago', ['empty' => true]);
                    echo $this->Form->control('estado_pago');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
