<?php

namespace app\controllers;

use app\models\Anuncios;
use app\models\DetalleSoftware;
use app\models\forms\AnuncioForm;
use app\models\forms\SoftwareForm;
use app\models\Software;
use Yii;
use yii\db\StaleObjectException;
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

    public function actionSoftware(): string
    {
        $softwares = Software::find()->all();

        return $this->render('/site/administrador/administrador-index', ['model' => $softwares]);
    }

    public function actionCarousel(): string
    {
        $model = Anuncios::find()->all();

        return $this->render('/site/administrador/carousel-index', ['model' => $model]);
    }

    public function actionCarouselCreate(): string
    {
        $model = new AnuncioForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            $model->imagen = \yii\web\UploadedFile::getInstance($model, 'imagen');
            $result = $model->created();

            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Anuncio creado exitosamente' : 'No crear el anuncio'
            );
        }

        return $this->render('/site/forms/form-carousel', ['title' => 'Crear carousel', 'model' => $model]);
    }

    public function actionCarouselEdit($id)
    {
        $current = Anuncios::findOne(['id' => $id]);

        if($current === null){
            return $this->goBack();
        }

        $model = new AnuncioForm();
        $model->page_name = $current->page_name;
        $model->imagen = $current->imagen;
        $model->fecha_inicio = $current->fecha_inicio;
        $model->fecha_final = $current->fecha_final;
        $model->nombre = $current->nombre;
        $model->descripcion	= $current->descripcion;
        $model->seo_message = $current->seo_message;

        $model->scenario = 'edit';

        if($model->load(Yii::$app->request->post())){
            $model->imagen = \yii\web\UploadedFile::getInstance($model, 'imagen');
            $result = $model->updated($current);

            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Anuncio creado exitosamente' : 'No crear el anuncio'
            );
        }


        return $this->render('/site/forms/form-carousel', ['title' => 'Editar carousel', 'model' => $model]);
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionCarouselDelete($id): \yii\web\Response
    {
        $anuncio = Anuncios::findOne(['id' => $id]);

        if($anuncio !== null && Yii::$app->request->post()){
            $anuncio->delete();
            Yii::$app->session->setFlash('success', 'Anuncio removido exitosamente');
        }

        return $this->redirect('/administrador/carousel');
    }

    public function actionSoftwareCreate() : string
    {
        $model = new SoftwareForm();
        $model->scenario = 'create';

        if($model->load(Yii::$app->request->post())){
            $model->fotografia = \yii\web\UploadedFile::getInstance($model, 'fotografia');
            $result = $model->saveForm();

            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Software añadido a la bibloteca' : 'No puedimos realizar el registro'
            );
        }

        return $this->render('/site/forms/form-software', ['model' => $model]);
    }

    public function actionSoftwareEdit($id): \yii\web\Response|string
    {
        $software = Software::findOne(['id' => $id]);

        if($software === null){
            Yii::$app->session->setFlash('error', 'Software no encontrado');
            return $this->goBack();
        }

        $detalles = DetalleSoftware::findOne(['id' => $software->informacion_id]);

        $model = new SoftwareForm();
        $model->scenario = 'edit';
        $model->fotografia = $software->fotografia;
        $model->nombre = $software->nombre;
        $model->precio = $software->precio;
        $model->descripcion = $detalles->descripcion;
        $model->version = $detalles->version;
        $model->fecha_lanzamiento = $detalles->fecha_lanzamiento;
        $model->requisitos = $detalles->requisitos;
        $model->enlace = $detalles->enlace;
        $model->desarrollador_id = $detalles->desarrollador_id;
        $model->licencia_id = $software->licencia_id;
        $model->categoria_id = $software->categoria_id;

        if($model->load(Yii::$app->request->post())){
            $model->fotografia = \yii\web\UploadedFile::getInstance($model, 'fotografia');
            $result = $model->updated($id);

            Yii::$app->session->setFlash(
                $result? 'success' : 'error',
                $result? 'Software modificado exitosamente' : 'No pudimos aplicar los cambios'
            );
        }

        return $this->render('/site/forms/form-software', ['model' => $model]);
    }

    public function actionSoftwareDelete($id): \yii\web\Response
    {
        $software = Software::findOne(['id' => $id]);
        if($software !== null){
            $software->delete();
            Yii::$app->session->setFlash('success', 'Software eliminado correctamente');
        }

        return $this->redirect('/administrador');
    }
}