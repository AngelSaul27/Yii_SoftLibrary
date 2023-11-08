<?php

namespace app\models\forms;

use app\models\Anuncios;
use Yii;
use yii\base\Model;
use yii\validators\FileValidator;

class AnuncioForm extends Model
{
    public $page_name;
    public $imagen;
    public $fecha_inicio;
    public $fecha_final;
    public $nombre;
    public $descripcion;
    public $seo_message;

    public function rules()
    {
        return [
            [['page_name','imagen','fecha_inicio','fecha_final', 'nombre', 'descripcion', 'seo_message'], 'required', 'on' => 'create'],
            [['page_name','fecha_inicio','fecha_final', 'nombre', 'descripcion', 'seo_message'], 'required', 'on' => 'edit'],
            ['fecha_inicio', 'date', 'format' => 'php:Y-m-d', 'message' => 'Formato de fecha incorrecto','on' => 'edit'],
            ['fecha_final', 'date', 'format' => 'php:Y-m-d', 'message' => 'Formato de fecha incorrecto','on' => 'create'],
            [['imagen'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'create'],
        ];
    }

    public function created()
    {
        if($this->validate()){
            $model = new Anuncios();
            $model->page_name = $this->page_name;
            $model->imagen = 'uploads/' . $this->imagen->baseName .'_'.(date("d_m_Y_h_i_s")). '.' . $this->imagen->extension;
            $model->fecha_inicio = $this->fecha_inicio;
            $model->fecha_final = $this->fecha_final;
            $model->nombre = $this->nombre;
            $model->descripcion	= $this->descripcion;
            $model->seo_message = $this->seo_message;

            if($model->save()){
                $this->imagen->saveAs($model->imagen);
                return true;
            }
        }

        return false;
    }

    public function updated($current): bool
    {
        if($this->validate()){
            $current->page_name = $this->page_name;
            $current->fecha_inicio = $this->fecha_inicio;
            $current->fecha_final = $this->fecha_final;
            $current->nombre = $this->nombre;
            $current->descripcion	= $this->descripcion;
            $current->seo_message = $this->seo_message;

            $rutaAntigua = null;

            if($this->imagen !== null){
                $reglas = new FileValidator(
                    ['extensions' => 'png, jpg, jpeg, webp', 'skipOnEmpty' => false]
                );

                $apply = $reglas->validate($this->imagen, $error);

                if ($apply) {
                    if (!empty($current->imagen)) {
                        $rutaAntigua = Yii::getAlias('@webroot/') . $current->imagen;
                        if (file_exists($rutaAntigua)) {
                            $current->imagen = 'uploads/' . $this->imagen->baseName .'_'.(date("d_m_Y_h_i_s")). '.' . $this->imagen->extension;
                        }
                    }
                }
            }

            if($current->save()){
                if ($rutaAntigua !== null && file_exists($rutaAntigua)) {
                    unlink($rutaAntigua);
                    $this->imagen->saveAs($current->imagen);
                }
                return true;
            }
        }

        return false;
    }

}