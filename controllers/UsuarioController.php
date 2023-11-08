<?php

namespace app\controllers;

use app\models\FavoritoSoftware;
use app\models\RegisterForm;
use Yii;
use yii\web\Controller;

class UsuarioController extends Controller
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
        return $this->render('/site/usuario/usuario-index');
    }

    public function actionMisFavoritos(): string
    {
        $favoritos = FavoritoSoftware::getListadoFavorito();

        return $this->render('/site/usuario/usuario-favorito', ['favoritos' => $favoritos]);
    }
}