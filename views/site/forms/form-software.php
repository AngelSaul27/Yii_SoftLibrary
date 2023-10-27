<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Formulario Software'
?>

<div class="min-vh-100 px-12 py-5 grid grid-cols-3">
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => ''], ]) ?>
    <div class="bg-white rounded-md divide-y divide-gray-300 shadow h-max">
        <div class="rounded-t-md py-2 px-3 bg-slate-900 text-white">
            <span class="font-bold text-xl text-uppercase"><?= $this->title ?></span>
        </div>

        <div class="px-3 py-1">
            <?= $form->field($model, 'nombre') ?>
            <?= $form->field($model, 'precio') ?>
            <?= $form->field($model, 'fotografia') ?>
            <?= $form->field($model, 'descripcion') ?>
            <?= $form->field($model, 'version') ?>
            <?= $form->field($model, 'fecha_lanzamiento') ?>
            <?= $form->field($model, 'requisitos') ?>
            <?= $form->field($model, 'enlace') ?>
            <!--SELECTS-->
            <?= $form->field($model, 'desarrollador_id') ?>
            <?= $form->field($model, 'licencia_id') ?>
            <?= $form->field($model, 'categoria_id') ?>
        </div>

        <div class="rounded-b-md py-2 px-3 bg-slate-900 flex justify-content-end">
            <button class="px-3 py-2 bg-green-800 hover:bg-green-700 text-white rounded-md">
                AGREGAR
            </button>
        </div>
    </div>
    <?php ActiveForm::end() ?>

</div>
