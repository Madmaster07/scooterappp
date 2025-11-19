<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetodoDePago $metodoDePago
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $metodoDePago->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $metodoDePago->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Metodo De Pago'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="metodoDePago form content">
            <?= $this->Form->create($metodoDePago) ?>
            <fieldset>
                <legend><?= __('Edit Metodo De Pago') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('metodo');
                    echo $this->Form->control('numero_tarjeta');
                    echo $this->Form->control('fecha_vencimiento', ['empty' => true]);
                    echo $this->Form->control('cvv');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
