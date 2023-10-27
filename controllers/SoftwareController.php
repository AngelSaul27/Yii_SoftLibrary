<?php

namespace app\controllers;

use app\models\DetalleSoftware;
use app\models\SoftwareSearch;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class SoftwareController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($page = 1): string
    {
        $searchModel = new SoftwareSearch();
        $searchModel->load(Yii::$app->request->get());

        $query = DetalleSoftware::find();
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

        return $this->render('/site/software_search', [
            'pages' => $pagination,
            'model' => $model ,
            'searchModel' => $searchModel
        ]);
    }
}