<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $libro->id],
                ['confirm' => __('Esta seguro de Borrar # {0}?', $libro->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Libros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="libros form content">
            <?= $this->Form->create($libro, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Editar Libro') ?></legend>
                <?php echo $this->Form->control('nombre'); ?>

                <?= $this->Html->image('Libros/'.$libro->imagen, array('width'=>125)) ?>

                <?php echo $this->Form->control('imagen', ['type'=>'file', 'required'=>false]); ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
