<?php

use webvimark\modules\UserManagement\models\rbacDB\Role;

$this->title = 'Dashboard'
?>

<div class="flex flex-col align-items-center justify-content-center min-vh-100">
    <div class="p-3">
        <img class="w-[100px] h-[90px] rounded-md shadow-sm" src="<?= Yii::getAlias('@web/'.Yii::$app->user->identity->fotografia)?>"  alt="<?= Yii::$app->user->username ?>">
    </div>
    <h1 class="text-3xl font-bold text-uppercase mb-2">Bienvenido</h1>
    <h1 class="text-3xl font-light text-uppercase"><?= Yii::$app->user->identity->getEmail() ?></h1>
    <span class="font-semibold text-uppercase mt-2"><?= key(Role::getUserRoles(Yii::$app->user->id))?></span>
</div>
