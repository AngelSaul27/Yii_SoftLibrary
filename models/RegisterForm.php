<?php

namespace app\models;

use webvimark\modules\UserManagement\models\User;
use yii\base\Model;

class RegisterForm extends Model
{
    CONST DEFAULT_ROLE = 'usuario';

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
            $model->username = $this->name;
            $model->email = $this->email;
            $model->password = password_hash($this->password, PASSWORD_DEFAULT);

            if($model->save()){
                return true;
            }
            return false;
        }
        return false;
    }


}