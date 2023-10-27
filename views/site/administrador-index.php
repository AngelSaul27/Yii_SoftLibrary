<?php
    $this->title = 'Dashboard'
?>

<div class="flex align-items-center justify-content-center min-vh-100">
    <h1 class="text-3xl font-bold text-uppercase">
        Bienvenido <?= Yii::$app->user->identity->getEmail() ?>
    </h1>
</div>
