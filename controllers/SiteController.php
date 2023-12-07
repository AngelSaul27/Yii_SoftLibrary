<?php

namespace app\controllers;

use app\models\Anuncios;
use app\models\ViewDetalleSoftware;
use webvimark\modules\UserManagement\models\forms\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use PhpParser\Node\Scalar\String_;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use webvimark\modules\UserManagement\models\User as UserModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $query = ViewDetalleSoftware::find();
        $Edicion =  $query->where(['categoria_nombre' => 'Software de Edición'])->limit(6)->all();
        $Oficina =  $query->where(['categoria_nombre' => 'Software de Oficina'])->limit(6)->all();
        $anuncios = Anuncios::find()
            ->where(['<=', 'fecha_inicio', date('Y-m-d')])
            ->andWhere(['>=', 'fecha_final', date('Y-m-d')])
            ->all();

        return $this->render('index',['edicion' => $Edicion, 'oficina' => $Oficina, 'anuncios' => $anuncios]);
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
            $role = key(Role::getUserRoles(Yii::$app->user->id));
            if($role === 'Usuario'){
                return $this->redirect(['./usuario']);
            }else if($role === 'Admin'){
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
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new UserModel(['scenario'=>'newUser']);

        if ($model->load(Yii::$app->request->post())) {
            $model->fotografia = UploadedFile::getInstance($model, 'fotografia');
            $model->uploaded =  UploadedFile::getInstance($model, 'fotografia');
            $result = $model->save();

            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Registro exitoso ya puedes ingresar' : 'No puedimos realizar el registro'
            );

            if($result){

                $role = UserModel::assignRole($model->id, UserModel::USER_DEFAULT);

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
