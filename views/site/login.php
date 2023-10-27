<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Login'
?>
<div class="w-full flex align-items-center justify-content-center bg-neutral-900 relative" style="min-height: 100vh; background-image: url('<?= Yii::getAlias('@web/imgs/fondo_library.jpg')?>'); background-position: center; background-size: cover">

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'w-[350px] h-max form-horizontal bg-white rounded-md px-4 py-5 shadow-sm'],
    ]) ?>

    <h1 class="text-3xl font-bold text-neutral-700 text-center -mt-3 mb-3 text-uppercase">Ingresar</h1>
    <?php
    echo $form->field($model, 'email')->textInput()->label('Email');
    echo $form->field($model, 'password')->passwordInput()->label('Password');

    echo Html::submitButton('Login', ['class' => 'btn btn-primary hover:bg-neutral-600 bg-neutral-800 border-none w-full']);
    ?>
    <?php ActiveForm::end() ?>
</div>
