<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?= $this->Form->control('email', ['required' => true, 'label' => 'E-mail']) ?>
        <?= $this->Form->control('password', ['required' => true, 'label' => 'Senha']) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <br>
    <?= $this->Html->link("Criar uma conta", ['action' => 'add']) ?>
</div>