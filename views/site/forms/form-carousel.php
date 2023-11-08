<?php use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;

$this->title = $title ?>

<div class="min-vh-100 px-12 py-5">

    <a href="<?= Yii::getAlias('@web/administrador/carousel')?>" class="p-2 my-3 rounded-md shadow w-max bg-neutral-900 text-white block">Voler atras</a>

    <?php $form = ActiveForm::begin() ?>
    <div class="bg-white rounded-md divide-y divide-gray-300 shadow h-full">
        <div class="rounded-t-md py-2 px-3 bg-slate-900 text-white">
            <span class="font-bold text-xl text-uppercase"><?= $this->title ?></span>
        </div>

        <div class="px-3 py-1 grid grid-cols-3 gap-5">
            <div>
                <?= $form->field($model, 'nombre') ?>
                <?= $form->field($model, 'descripcion')->textarea() ?>

            </div>

            <div>
                <?= $form->field($model, 'page_name')->textarea()->label('Mostrar en') ?>
                <?= $form->field($model, 'seo_message')->textarea()->label('Sobre la imagen') ?>
            </div>
            <div class="grid grid-cols-2 gap-2 h-max">
                <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::className(), ['options' => ['placeholder' => '##-##-####'] ,'dateFormat' => 'yyyy-MM-dd']) ?>
                <?= $form->field($model, 'fecha_final')->widget(DatePicker::className(), ['options' => ['placeholder' => '##-##-####'] ,'dateFormat' => 'yyyy-MM-dd']) ?>
                <div class="col-span-2">
                    <?= $form->field($model, 'imagen')->fileInput(['class' => 'col-span-2 w-full']) ?>
                </div>
            </div>
        </div>

        <div class="rounded-b-md py-2 px-3 bg-slate-900 flex justify-content-end">
            <button class="px-3 py-2 bg-green-800 hover:bg-green-700 text-white rounded-md">
                <?= $title ?>
            </button>
        </div>
    </div>
    <?php ActiveForm::end() ?>

</div>
