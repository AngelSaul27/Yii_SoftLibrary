<?php

namespace app\controllers;

use app\models\FavoritoSoftware;
use app\models\Software;
use app\models\ViewDetalleSoftware;
use app\models\SoftwareSearch;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class SoftwareController extends Controller
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
    public function actionIndex($page = 1): string
    {
        $searchModel = new SoftwareSearch();
        $searchModel->load(Yii::$app->request->get());

        $query = ViewDetalleSoftware::find();
        $searchModel->aplicarFiltro($query);
        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'page' => $page-1,
            'defaultPageSize' => 8
        ]);

        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('/site/software/software_search', [
            'pages' => $pagination,
            'model' => $model ,
            'searchModel' => $searchModel
        ]);
    }

    public function actionView($id): \yii\web\Response|string
    {
        $software = ViewDetalleSoftware::findOne(['id' => $id]);

        if($software === null){
            Yii::$app->session->setFlash('error', 'El software no fue encontrado');
            return $this->goBack();
        }

        return $this->render('/site/software/software_view', ['software' => $software]);
    }

    public function actionAgregarFavorito($id): \yii\web\Response
    {
       if(Yii::$app->user->isGuest){
           return $this->redirect('/login');
       }

        if(Yii::$app->request->post()){
            if (FavoritoSoftware::isSoftwareAdded($id)){
                Yii::$app->session->setFlash('warning', 'El software ya se encuentra en tu lista de favoritos');
                return $this->redirect('/software/'.$id);
            }

            $favorito = new FavoritoSoftware();
            $favorito->user_id = Yii::$app->user->id;
            $favorito->software_id = $id;
            $favorito->created_at = date('Y-m-d');

            if($favorito->save()){
                Yii::$app->session->setFlash('success', 'Software añadido a tu lista de favoritos');
                return $this->redirect('/software/'.$id);
            }else{
                Yii::$app->session->setFlash('error', 'No pudimos agregar este software a tu lista de favoritos');
                return $this->redirect('/software/'.$id);
            }
        }

        Yii::$app->session->setFlash('error', 'No tienes permiso de realizar esto');
        return $this->goBack();
    }

    public function actionEliminarFavorito($id): \yii\web\Response
    {
        if(Yii::$app->request->post()){
            $model = FavoritoSoftware::getFavorito($id);

            if($model !== null){
                $model->delete();
                Yii::$app->session->setFlash('success', 'Software eliminado de tu lista de favoritos');
                return $this->redirect('/usuario/mis-favoritos');
            }
        }
        
        Yii::$app->session->setFlash('error', 'No pudimos eliminar el software de tu lista de favoritos');
        return $this->redirect('/usuario/mis-favoritos');
    }
}