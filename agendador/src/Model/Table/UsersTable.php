<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Tasks', [
            'foreignKey' => 'user_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email', false, 'Por favor, forneça um endereço de e-mail válido.')
            ->requirePresence('email', 'create', 'O campo de e-mail é obrigatório.')
            ->notEmptyString('email', 'O e-mail não pode ser vazio.')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Este e-mail já está em uso.']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create', 'A senha é obrigatória.')
            ->notEmptyString('password', 'A senha não pode ser vazia.')
            ->minLength('password', 6, 'A senha deve ter pelo menos 6 caracteres.');

        return $validator;
    }
}