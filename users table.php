// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('MetodoDePago', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Viajes', [
            'foreignKey' => 'user_id',
        ]);

        $this->hasMany('Pagos', [
            'foreignKey' => 'user_id', // si lo manejas así
            'dependent' => false,
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmptyString('username')
            ->email('correo')
            ->notEmptyString('password', 'La contraseña es obligatoria');
    }
}
