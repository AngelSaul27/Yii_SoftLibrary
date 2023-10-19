<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name; ?>

<div class="site-error flex flex-col items-center justify-center" style="height: calc(100vh - 224px);">

    <div class="w-full h-max">
        <h1 class="font-bold text-4xl mb-2 text-center"><?= Html::encode($this->title) ?></h1>

        <div class="text-2xl font-light text-center my-2">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p class="text-center font-light">
            El error anterior ocurrió mientras el servidor web estaba procesando su solicitud.
        </p>
        <p class="text-center font-light">
            Comuníquese con nosotros si cree que se trata de un error del servidor. Gracias
        </p>
    </div>


</div>