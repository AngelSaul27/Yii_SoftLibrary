<?php

namespace app\models\forms;

use app\models\DetalleSoftware;
use app\models\Software;
use Yii;
use yii\base\Model;
use yii\validators\FileValidator;

class SoftwareForm extends Model
{
    public $nombre;
    public $precio;
    public $fotografia;
    public $descripcion;
    public $version;
    public $fecha_lanzamiento;
    public $requisitos;
    public $enlace;
    public $desarrollador_id;
    public $licencia_id;
    public $categoria_id;

    public function rules()
    {
        return [
            [
                ['nombre', 'precio', 'fotografia', 'descripcion', 'version',
                    'requisitos', 'fecha_lanzamiento', 'enlace',
                    'desarrollador_id', 'licencia_id', 'categoria_id'
                ], 'required', 'on' => 'create'
            ],
            [
                ['nombre', 'precio', 'descripcion', 'version',
                    'requisitos', 'fecha_lanzamiento', 'enlace',
                    'desarrollador_id', 'licencia_id', 'categoria_id'
                ], 'required', 'on' => 'edit'
            ],
            [['fotografia'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'create'],
            ['fecha_lanzamiento', 'date', 'format' => 'php:Y-m-d', 'message' => 'Formato de fecha incorrecto','on' => 'edit'],
            ['fecha_lanzamiento', 'date', 'format' => 'php:Y-m-d', 'message' => 'Formato de fecha incorrecto','on' => 'create'],
        ];
    }

    public function updated($id): bool
    {
        if($this->validate()){
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $software = Software::findOne(['id' => $id]);

                $informacion = DetalleSoftware::findOne(['id' => $software->informacion_id]);
                $informacion->descripcion = $this->descripcion;
                $informacion->version = $this->version;
                $informacion->fecha_lanzamiento = $this->fecha_lanzamiento;
                $informacion->requisitos = $this->requisitos;
                $informacion->enlace = $this->enlace;
                $informacion->desarrollador_id = $this->desarrollador_id;

                $informacion->save();

                $software->nombre = $this->nombre;
                $software->precio = $this->precio;
                $software->licencia_id = $this->licencia_id;
                $software->categoria_id = $this->categoria_id;

                $rutaAntigua = null;

                if($this->fotografia !== null){
                    $reglas = new FileValidator(
                        ['extensions' => 'png, jpg, jpeg, webp', 'skipOnEmpty' => false]
                    );

                    $apply = $reglas->validate($this->fotografia, $error);

                    if ($apply) {
                        if (!empty($software->fotografia)) {
                            $rutaAntigua = Yii::getAlias('@webroot/') . $software->fotografia;
                            if (file_exists($rutaAntigua)) {
                                $software->fotografia = 'uploads/' . $this->fotografia->baseName .'_'.(date("d_m_Y_h_i_s")). '.' . $this->fotografia->extension;
                            }
                        }
                    }
                }

                if($software->save()){
                    if ($rutaAntigua !== null && file_exists($rutaAntigua)) {
                        unlink($rutaAntigua);
                        $this->fotografia->saveAs($software->fotografia);
                    }

                    $transaction->commit();
                    return true;
                }
            }catch (\Exception $e){
                $transaction->rollBack();

                return false;
            }
        }
        return false;
    }

    public function saveForm(): bool
    {
        if($this->validate()){
            $transaction = Yii::$app->db->beginTransaction();
            try{
                $informacion = new DetalleSoftware();
                $informacion->descripcion = $this->descripcion;
                $informacion->version = $this->version;
                $informacion->fecha_lanzamiento = $this->fecha_lanzamiento;
                $informacion->requisitos = $this->requisitos;
                $informacion->enlace = $this->enlace;
                $informacion->desarrollador_id = $this->desarrollador_id;

                if($informacion->save()){
                    $fotoName = 'uploads/' . $this->fotografia->baseName .'_'.(date("d_m_Y_h_i_s")). '.' . $this->fotografia->extension;

                    $software = new Software();
                    $software->nombre = $this->nombre;
                    $software->precio = $this->precio;
                    $software->fotografia = $fotoName;
                    $software->licencia_id = $this->licencia_id;
                    $software->categoria_id = $this->categoria_id;
                    $software->informacion_id = $informacion->id;

                    if($software->save()){
                        $this->fotografia->saveAs($fotoName);
                        $transaction->commit();
                        return true;
                    }
                }
            }catch (\Exception $e){
                $transaction->rollBack();
            }
            return false;
        }
        return false;
    }
}