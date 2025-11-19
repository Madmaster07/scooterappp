<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promocione $promocione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $promocione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $promocione->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Promociones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="promociones form content">
            <?= $this->Form->create($promocione) ?>
            <fieldset>
                <legend><?= __('Edit Promocione') ?></legend>
                <?php
                    echo $this->Form->control('codigo');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('porcentaje_descuento');
                    echo $this->Form->control('fecha_inicio', ['empty' => true]);
                    echo $this->Form->control('fecha_fin', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
