<?php

namespace app\widgets;

use yii\base\Widget;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

class SoftwareSearch extends Widget
{

    public function run(): void
    {
        ActiveForm::begin([
            'action' => ['softwares/search'],
            'method' => 'get',
            'options' => ['class' => 'flex w-full']
        ]);

        echo Html::textInput(
            'nombre', // Ajusta el nombre del campo según tu modelo
            '', // Valor inicial del campo (puedes proporcionar un valor predeterminado si lo deseas)
            [
                'class' => 'outline-none rounded-r border-r border-t border-b px-4 py-2 w-full',
                'placeholder' => 'Buscar software por nombre'
            ]
        );

        ActiveForm::end();
    }

}