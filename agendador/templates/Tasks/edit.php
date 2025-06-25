<?php

use PhpParser\Node\Stmt\Label;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Você quer mesmo deletar a tarefa {0}?', $task->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar tarefas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Editar tarefa') ?></legend>
                <?php
                    echo $this->Form->control('title' , options: ['label' => 'Título']);
                    echo $this->Form->control('description', options: ['type' => 'textarea', 'label' => 'Descrição']);
                    echo $this->Form->control('data_agendada', ['empty' => true, 'label' => 'Data Agendada']);
                    echo $this->Form->control('completed', [
                        'type' => 'checkbox',
                        'label' => 'Finalizado'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
