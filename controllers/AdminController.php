<?php

namespace app\controllers;

use app\models\forms\SoftwareForm;
use app\models\RegisterForm;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class AdminController extends Controller
{
    public function behaviors(): array
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('/site/administrador-index');
    }

    public function actionFormSoftware() : string
    {
        $model = new SoftwareForm();
        return $this->render('/site/forms/form-software', ['model' => $model]);
    }
}