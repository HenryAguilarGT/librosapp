<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro[]|\Cake\Collection\CollectionInterface $libros
 */
?>
<div class="libros index content">
    <?= $this->Html->link(__('NUEVO'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Libros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('imagen') ?></th>
                    <th><?= $this->Paginator->sort('Creado') ?></th>
                    <th><?= $this->Paginator->sort('Modificado') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($libro->id) ?></td> -->
                    <td><?= h($libro->nombre) ?></td>
                    <td>
                        <!-- <?= h($libro->imagen) ?> -->
                        <?= $this->Html->image('Libros/'.$libro->imagen, array('width'=>125)) ?>
                    </td>
                    <td><?= h($libro->created) ?></td>
                    <td><?= h($libro->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $libro->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $libro->id]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $libro->id], ['confirm' => __('Esta seguro de borrar # {0}?', $libro->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
