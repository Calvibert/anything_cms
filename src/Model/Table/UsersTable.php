<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('first_name', "Un prenom d'utilisateur est nécessaire")
            ->notEmpty('last_name', "Un nom de famille d'utilisateur est nécessaire")
            ->notEmpty('email', "Un nom d'utilisateur est nécessaire")
            ->notEmpty('password', 'Un mot de passe est nécessaire')
            ->notEmpty('role', 'Un role est nécessaire')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'regular']],
                'message' => 'Merci de rentrer un role valide'
            ]);
    }

    public function search($key)
    {
        $results = $this->find('all')
            ->where([
                'or' => [
                    'email LIKE "%'.$key.'%"',
                    'first_name LIKE "%'.$key.'%"',
                    'last_name LIKE "%'.$key.'%"'
                ]
            ])
            ->toArray();

        return $results;
    }
}
