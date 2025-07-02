<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Task> $tasks
 */
?>
<?php $this->assign('title', 'lista de tarefas'); ?>
<div class="tasks index content">
    <?= $this->Html->link(__('Nova Tarefa'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tarefas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', title: 'Código') ?></th>
                    <th><?= $this->Paginator->sort('title', title: 'Título') ?></th>
                    <th><?= $this->Paginator->sort('completed', title: 'Completado') ?></th>
                    <th><?= $this->Paginator->sort('data_agendada', 'Data Agendada') ?></th>
                    <th><?= $this->Paginator->sort('created', title: 'Criado') ?></th>
                    <th><?= $this->Paginator->sort('modified', title: 'Modificado') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $this->Number->format($task->id) ?></td>
                        <td><?= h($task->title) ?></td>
                        <td><?= $task->completed ? __('Sim') : __('Não') ?></td>
                        <td><?= h($task->data_agendada ? $task->data_agendada->format('d/m/Y') : '') ?></td>
                        <td><?= h($task->created ? $task->created->format('d/m/Y') : '') ?></td>
                        <td><?= h($task->modified ? $task->modified->format('d/m/Y') : '') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $task->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $task->id]) ?>
                            <?= $this->Form->postLink(
                                __('Deletar'),
                                ['action' => 'delete', $task->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Você quer mesmo deletar a tarefa {0}?', $task->id),
                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, visualizando {{current}} registro(s) de {{count}} total')) ?>
        </p>
    </div>
</div>
