<?php

namespace app\models;

use yii\base\Model;

class RegisterForm extends Model
{
    CONST DEFAULT_ROLE = 'usuario';
    CONST ADMIN_ROLE = 'administrador';

    public $name, $password, $email;

    public function rules(): array
    {
        return [
            [['email', 'password', 'name'], 'required', 'on' => 'USUARIO', 'message' => 'Estos campos son obligatorios'],
            ['email', 'email', 'message' => 'Ingrese un correo valido'],
        ];
    }

    public function execute(): bool
    {
        if($this->validate()){
            $model = new User();
            $model->name = $this->name;
            $model->email = $this->email;
            $model->password = password_hash($this->password, PASSWORD_DEFAULT);
            $model->timestamp = date('Y-m-d H:i:s');
            $model->role = self::DEFAULT_ROLE;

            if($model->save()){
                return true;
            }
            return false;
        }
        return false;
    }


}