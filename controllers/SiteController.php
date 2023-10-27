<?php

namespace app\controllers;

use app\models\DetalleSoftware;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use PhpParser\Node\Scalar\String_;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $query = DetalleSoftware::find();
        $Edicion =  $query->where(['categoria_nombre' => 'Software de Edición'])->limit(6)->all();
        $Oficina =  $query->where(['categoria_nombre' => 'Software de Oficina'])->limit(6)->all();

        return $this->render('index',['edicion' => $Edicion, 'oficina' => $Oficina]);
    }

    /**
     * Displays login page.
     *
     * @return Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user = Yii::$app->user->identity;
            $role = $user->getRole();

            if($role === RegisterForm::DEFAULT_ROLE){
                return $this->redirect(['./usuario']);
            }else if($role === RegisterForm::ADMIN_ROLE){
                return $this->redirect(['./administrador']);
            }

            Yii::$app->session->setFlash('Error', 'Role'.$role);
            return $this->goHome();
        }

        return $this->render('login', ['model' => $model]);
    }

    /**
     * Displays register page.
     *
     * @return string
     */
    public function actionRegister(): string
    {
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new RegisterForm();
        $model->scenario = 'USUARIO';

        if ($model->load(Yii::$app->request->post())) {
            $result = $model->execute();
            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Registro exitoso ya puedes ingresar' : 'No puedimos realizar el registro'
            );

            if($result){
                return $this->redirect('/');
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Displays logout page.
     *
     * @return string
     */
    public function actionLogout(): Response
    {
        if (Yii::$app->request->post()){
            Yii::$app->user->logout();
        }
        return $this->goHome();
    }

}
