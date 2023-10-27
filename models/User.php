<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'usuario';
    }

    public static function findByEmail($correo): ?User
    {
        return static::findOne(['email' => $correo]);
    }

    public static function findIdentity($id){
        return static::findOne($id);
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getId(){
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function validatePassword($password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getAuthKey(){}

    public function validateAuthKey($authKey){}
}