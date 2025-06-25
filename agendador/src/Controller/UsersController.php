<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Permite acesso não autenticado a 'login' e 'add'
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // Se o usuário estiver logado, redireciona
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Tasks',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }

        // Exibe erro se o login falhar
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('E-mail ou senha inválidos');
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('Usuário criado com sucesso! Você já pode fazer o login.');
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('Não foi possível criar o usuário. Tente novamente.');
        }
        $this->set(compact('user'));
    }
}