<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\merchant\models\search\AuthItemGroupSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-index px-5 py-4 min-vh-100">

    <h2 class="font-bold text-3xl mb-2"><?= $this->title ?></h2>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(UserManagementModule::t('back', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(UserManagementModule::t('back', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
