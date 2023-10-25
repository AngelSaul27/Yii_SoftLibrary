<?php

namespace app\controllers;

use Yii;
use app\models\ListadoSoftwareSearch;
use app\models\vw_detalle_software;
use yii\web\Controller;
use yii\data\Pagination;

class ListadoSoftwareController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($page = 1)
    {
        $searchModel = new ListadoSoftwareSearch();
        $searchModel->load(Yii::$app->request->get());

        $query = vw_detalle_software::find();

        if (!empty($searchModel->categoria)) {
            if (in_array(0, $searchModel->categoria)) {
                $searchModel->categoria = array_diff($searchModel->categoria, [0]);
            }

            if (!empty($searchModel->categoria)) {
                $query->andWhere(['IN', 'categoria_nombre', $searchModel->categoria]);
            }
        }

        if (!empty($searchModel->tipo)) {
            if (in_array(0, $searchModel->tipo)) {
                $searchModel->tipo = array_diff($searchModel->tipo, [0]);
            }

            if (!empty($searchModel->tipo)) {
                $query->andWhere(['IN', 'nombre_licencia', $searchModel->tipo]);
            }
        }

        if (!empty($searchModel->publicacion)) {
            $query->andWhere(['>=', 'fecha_lanzamiento', $searchModel->publicacion]);
        }
        
        $count = $query->count();
        $pagination = new Pagination([
                'totalCount' => $count,
                'page' => $page-1,
                'defaultPageSize' => 8 ]);

        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
                'pages' => $pagination,
                'model' => $model ,
                'searchModel' => $searchModel]);
    }
}
