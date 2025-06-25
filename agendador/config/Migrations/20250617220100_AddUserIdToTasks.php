<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddUserIdToTasks extends AbstractMigration
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
        $table = $this->table('tasks');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'after' => 'id', // Opcional: posiciona a coluna no banco de dados
        ]);
        $table->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION']);
        $table->update();
    }
}