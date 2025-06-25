<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Criar Conta de Usuário') ?></legend>
        <?php
            echo $this->Form->control('email', ['label' => 'E-mail']);
            echo $this->Form->control('password', ['label' => 'Senha']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Criar conta')) ?>
    <?= $this->Form->end() ?>
</div>