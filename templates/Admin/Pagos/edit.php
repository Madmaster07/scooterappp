<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pago $pago
 * @var string[]|\Cake\Collection\CollectionInterface $viajes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pago->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pagos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pagos form content">
            <?= $this->Form->create($pago) ?>
            <fieldset>
                <legend><?= __('Edit Pago') ?></legend>
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
