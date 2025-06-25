<?php
declare(strict_types=1);

namespace App\Controller;

class TasksController extends AppController
{
    public function index()
    {
        // Filtra as tarefas para mostrar apenas as do usuário logado
        $query = $this->Tasks->find()
            ->where(['Tasks.user_id' => $this->Authentication->getIdentity()->get('id')]);
        
        $tasks = $this->paginate($query);
        $this->set(compact('tasks'));
    }

    public function view($id = null)
    {
        // Garante que o usuário só possa ver suas próprias tarefas
        $task = $this->Tasks->get($id, [
            'contain' => [],
            'conditions' => ['Tasks.user_id' => $this->Authentication->getIdentity()->get('id')]
        ]);
        $this->set(compact('task'));
    }

    public function add()
    {
        $task = $this->Tasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            // Define o user_id da tarefa com o id do usuário logado
            $task->user_id = $this->Authentication->getIdentity()->get('id');
            
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('A tarefa foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A tarefa não pôde ser salva. Tente novamente.'));
        }
        $this->set(compact('task'));
    }

    public function edit($id = null)
    {
        // Garante que o usuário só possa editar suas próprias tarefas
        $task = $this->Tasks->get($id, [
            'contain' => [],
            'conditions' => ['Tasks.user_id' => $this->Authentication->getIdentity()->get('id')]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            // O user_id não precisa ser redefinido aqui, pois já pertence ao usuário
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('A tarefa foi salva.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A tarefa não pôde ser salva. Tente novamente.'));
        }
        $this->set(compact('task'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // Garante que o usuário só possa deletar suas próprias tarefas
        $task = $this->Tasks->get($id, [
            'conditions' => ['Tasks.user_id' => $this->Authentication->getIdentity()->get('id')]
        ]);
        
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('A tarefa foi deletada.'));
        } else {
            $this->Flash->error(__('A tarefa não pôde ser deletada. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}