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
            <?= $this->Html->link(__('Editar Libro'), ['action' => 'edit', $libro->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Borrar Libro'), ['action' => 'delete', $libro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libro->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Libros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Libro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="libros view content">
            <!-- <h3><?= h($libro->id) ?></h3> -->
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($libro->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imagen') ?></th>
                    <td>
                        <!-- <?= h($libro->imagen) ?> -->
                        <?= $this->Html->image('Libros/'.$libro->imagen, array('width'=>125)) ?>
                    </td>
                </tr>
                <tr>
                    <!-- <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($libro->id) ?></td> -->
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($libro->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($libro->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
