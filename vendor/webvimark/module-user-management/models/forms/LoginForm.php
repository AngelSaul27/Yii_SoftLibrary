<?php
namespace webvimark\modules\UserManagement\models\forms;

use webvimark\helpers\LittleBigHelper;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\base\Model;
use Yii;

class LoginForm extends Model
{

    public $email;
	public $username;
	public $password;
	public $rememberMe = true;

	private $_user = false;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
            [['email', 'password'], 'required', 'message' => 'Estos campos son obligatorios'],
            ['email', 'email', 'message' => 'Ingrese un correo valido'],
            ['password', 'validatePassword'],
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 */
	public function validatePassword()
	{
		if ( !Yii::$app->getModule('user-management')->checkAttempts() )
		{
			$this->addError('password', UserManagementModule::t('front', 'Too many attempts'));

			return false;
		}

		if ( !$this->hasErrors() )
		{
			$user = $this->getUser();
			if ( !$user || !$user->validatePassword($this->password) )
			{
				$this->addError('password', UserManagementModule::t('front', 'Incorrect username or password.'));
			}
		}
	}

	/**
	 * Check if user is binded to IP and compare it with his actual IP
	 */
	public function validateIP()
	{
		$user = $this->getUser();

		if ( $user AND $user->bind_to_ip )
		{
			$ips = explode(',', $user->bind_to_ip);

			$ips = array_map('trim', $ips);

			if ( !in_array(LittleBigHelper::getRealIp(), $ips) )
			{
				$this->addError('password', UserManagementModule::t('front', "You could not login from this IP"));
			}
		}
	}

	/**
	 * Logs in a user using the provided username and password.
	 * @return boolean whether the user is logged in successfully
	 */
	public function login()
	{
		if ( $this->validate() )
		{
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? Yii::$app->user->cookieLifetime : 0);
		}
		else
		{
			return false;
		}
	}

	/**
	 * Finds user by [[username]]
	 * @return User|null
	 */
	public function getUser()
	{
		if ( $this->_user === false )
		{
			$u = new \Yii::$app->user->identityClass;
			$this->_user = ($u instanceof User ? $u->findByEmail($this->email) : User::findByEmail($this->email));
		}

		return $this->_user;
	}
}
