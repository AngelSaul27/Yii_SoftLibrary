<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $name, $password, $email;

    public function rules(): array
    {
        return [
            [['email', 'password'], 'required', 'message' => 'Estos campos son obligatorios'],
            ['email', 'email', 'message' => 'Ingrese un correo valido'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = User::findByEmail($this->email);
            if(!$user || !$user->validatePassword($this->password)){
                $this->addError($attribute, 'Correo electrónico o contraseña incorrectos.');
            }
        }
    }

    public function login(): bool
    {
        if($this->validate()){
            $user = User::findByEmail($this->email);
            return Yii::$app->user->login($user, 3600 * 24 * 30);
        }
        return false;
    }
}