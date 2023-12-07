<?php

use app\models\CategoriaSoftware;
use app\models\Desarrollador;
use app\models\LicenciaSoftware;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
$this->title = 'Formulario Software'
?>

<div class="min-vh-100 px-12 py-5">

    <a href="<?= Yii::getAlias('@web/administrador')?>" class="p-2 my-3 rounded-md shadow w-max bg-neutral-900 text-white block">Voler atras</a>

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => ''], ]) ?>
    <div class="bg-white rounded-md divide-y divide-gray-300 shadow h-full">
        <div class="rounded-t-md py-2 px-3 bg-slate-900 text-white">
            <span class="font-bold text-xl text-uppercase"><?= $this->title ?></span>
        </div>

        <div class="px-3 py-1 grid grid-cols-3 gap-5">
            <div>
                <?= $form->field($model, 'nombre') ?>
                <?= $form->field($model, 'descripcion')->textarea() ?>
                <?= $form->field($model, 'requisitos')->textarea() ?>
            </div>

            <div>
                <?= $form->field($model, 'version')->input('number') ?>
                <?= $form->field($model, 'precio')->input('number') ?>
                <?= $form->field($model, 'enlace') ?>

            </div>
            <div class="grid grid-cols-2 gap-2 h-max">
                <?= $form->field($model, 'fecha_lanzamiento')->widget(DatePicker::className(), ['options' => ['placeholder' => '##-##-####'] ,'dateFormat' => 'yyyy-MM-dd']) ?>
                <?= $form->field($model, 'desarrollador_id')->dropDownList(ArrayHelper::map(Desarrollador::find()->all(), 'id', 'nombre'), ['prompt' => 'Seleccione el desarrollador'])->label('Desarrollador') ?>
                <?= $form->field($model, 'licencia_id')->dropDownList(ArrayHelper::map(LicenciaSoftware::find()->all(), 'id', 'nombre'),['prompt' => 'Seleccione la licencia'])->label('Licencia') ?>
                <?= $form->field($model, 'categoria_id')->dropDownList(ArrayHelper::map(CategoriaSoftware::find()->all(), 'id', 'nombre'), ['prompt' => 'Seleccione la categoria'])->label('Categoria') ?>
                <?= $form->field($model, 'fotografia')->fileInput(['class' => 'col-span-2']) ?>
            </div>
        </div>

        <div class="rounded-b-md py-2 px-3 bg-slate-900 flex justify-content-end">
            <button class="px-3 py-2 bg-green-800 hover:bg-green-700 text-white rounded-md">
                AGREGAR
            </button>
        </div>
    </div>
    <?php ActiveForm::end() ?>

</div>
