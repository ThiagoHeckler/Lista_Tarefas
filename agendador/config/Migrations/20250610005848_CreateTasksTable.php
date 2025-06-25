<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTasksTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/3/en/index.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        // Cria a tabela 'tasks'
        $table = $this->table('tasks');

        // Adiciona a coluna 'title' (título da tarefa)
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255, // Máximo de 255 caracteres
            'null' => false, // Não pode ser nulo
        ]);

        // Adiciona a coluna 'description' (descrição da tarefa)
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true, // Pode ser nulo
        ]);

        // Adiciona a coluna 'status' para saber se a tarefa foi concluída
        $table->addColumn('completed', 'boolean', [
            'default' => false, // Por padrão, a tarefa não está concluída
            'null' => false,
        ]);

        // Adiciona a coluna para a data de agendamento
        $table->addColumn('data_agendada', 'date', [
            'default' => null,
            'null' => true,
        ]);

        // Adiciona colunas de data e hora automaticamente gerenciadas pelo CakePHP
        $table->addTimestamps('created', 'modified');

        // Cria a tabela no banco de dados
        $table->create();
    }
}
