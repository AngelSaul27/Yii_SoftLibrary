<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Soft Library';
?>
<div class="my-4 mx-12">
    <div class="grid grid-cols-5 gap-5">
        <div class="col-span-1">
            <h1 class="text-2xl font-bold uppercase">Filtros</h1>

            <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get']); ?>

            <div class="flex flex-col space-y-1 my-2">
                <h1 class="font-bold text-sm uppercase text-slate-700 my-2">Categoría</h1>
                <?= $form->field($searchModel, 'categoria[0]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Edición', ['class' => 'text-slate-500']), 'value' => 'Software de Edición', 'class' => 'outline-none',])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[1]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Oficina', ['class' => 'text-slate-500']), 'value' => 'Software de Oficina', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[2]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Desarrollo', ['class' => 'text-slate-500']), 'value' => 'Software de Desarrollo', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[3]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Diseño y Multimedia', ['class' => 'text-slate-500']), 'value' => 'Software de Diseño y Multimedia', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[4]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Productividad', ['class' => 'text-slate-500']), 'value' => 'Software de Productividad', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[5]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Seguridad', ['class' => 'text-slate-500']), 'value' => 'Software de Seguridad', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[6]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Sistemas Operativos', ['class' => 'text-slate-500']), 'value' => 'Software de Sistemas Operativos', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[7]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Navegación y Comunicación', ['class' => 'text-slate-500']), 'value' => 'Software de Navegación y Comunicación', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[8]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Entretenimiento', ['class' => 'text-slate-500']), 'value' => 'Software de Entretenimiento', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'categoria[9]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Software de Educación', ['class' => 'text-slate-500']), 'value' => 'Software de Educación', 'class' => 'outline-none'])->label(false) ?>

                <h1 class="font-bold text-sm uppercase text-slate-700 my-2">Tipo</h1>

                <?= $form->field($searchModel, 'tipo[0]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Gratuito', ['class' => 'text-slate-500']), 'value' => 'Gratuito', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'tipo[1]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Con Lincencia', ['class' => 'text-slate-500']), 'value' => 'Con Lincencia', 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'tipo[2]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Pago unico', ['class' => 'text-slate-500']), 'value' => 'Pago unico', 'class' => 'outline-none'])->label(false) ?>

                <h1 class="font-bold text-sm uppercase text-slate-700 my-2">Formato</h1>

                <?= $form->field($searchModel, 'formato[0]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Archivos de Instalación', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'formato[1]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Ejecutables (.EXE)', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'formato[2]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Paquestes de Distribución', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'formato[3]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Archivos Comprimidos', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'formato[4]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Imágenes de Disco(ISO)', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'formato[5]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Applicaciones Moviles(APK)', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>
                <?= $form->field($searchModel, 'formato[6]')->checkbox(['template' => "{input} {label}", 'label' => Html::tag('span', 'Online (nube)', ['class' => 'text-slate-500']), 'class' => 'outline-none'])->label(false) ?>

                <h1 class="font-bold text-sm uppercase text-slate-700 my-2">Publicación</h1>

                <div class="grid grid-cols-3 ">
                    <span class="text-slate-500 cols-1">Fecha</span>
                    <?= $form->field($searchModel, 'publicacion')->input('date', ['class' => 'outline-none'])->label(false) ?>
                </div>

                <?= Html::submitButton('Filtrar', ['class' => 'mt-2 bg-neutral-800 rounded-md shadow text-white py-2 w-full']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <!--Listado-->
        <div class="col-span-4">
            <div class="flex w-full justify-end mt-2 mb-3 gap-2">
                <button class="rounded-md shadow-sm p-1 text-white bg-neutral-800 px-2">
                    Mas populares
                </button>

                <button class="rounded-md shadow-sm p-1 text-white bg-neutral-800 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                </button>

                <button class="rounded-md shadow-sm p-1 text-white bg-neutral-800 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-4 gap-4 mt-1">
                <?php if (isset($model)) : foreach ($model as $item) : ?>
                        <div class="software_content rounded-md">
                            <div class="software_overview relative cursor-pointer">
                                <span class="text-sm text-white absolute rounded-r bg-neutral-800 shadow px-2 top-4 select-none">
                                    <?= $item['nombre_licencia']; ?>
                                </span>

                                <div class="software_overview-image rounded-md overflow-hidden shadow-sm">
                                    <img src="<?= $item["fotografia"] ?>" alt="office_365_lincencia">
                                </div>
                            </div>
                            <div class="software_about my-2 cursor-pointer">
                                <span class="text-sm text-amber-700">
                                    <?= $item['categoria_nombre']; ?>
                                </span>
                                <h2 class="text-xl font-bold -mb-1 -mt-1 text-slate-700">
                                    <?= $item['nombre']; ?>
                                </h2>
                                <span class="text-xs text-gray-400">
                                    <?= $item['desarrollador_nombre']; ?>
                                </span>
                                <span class="font-semibold text-lg text-slate-600 block -mt-1">$
                                    <?= $item['precio']; ?>
                                    .00 MXN</span>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>

            <?php if (isset($model) && count($model) <= 0) : ?>
                <div class="w-full items-center">
                    <h1 class="text-2xl font-bold text-center mt-12 mb-2">No se encontrarón elementos</h1>
                    <span class="mb-12 text-slate-600 text-sm text-center block">No hay resultados por ahora intento más tarde o explore otras opciones.</span>
                </div>
            <?php endif; ?>

            <?php
            if (isset($pages)) {
                echo LinkPager::widget([
                    'pagination' => $pages,
                    'options' => ['class' => 'pagination flex gap-2 mb-2 mt-3 items-center justify-center'], // Personalizar la clase del contenedor
                    'prevPageLabel' => 'Anterior', // Texto del enlace "Anterior"
                    'nextPageLabel' => 'Siguiente', // Texto del enlace "Siguiente"
                    'prevPageCssClass' => 'rounded-md shadow-sm bg-neutral-900 w-20 h-9 pageIndex select-none', // Clase CSS para el enlace "Anterior"
                    'nextPageCssClass' => 'rounded-md shadow-sm bg-neutral-900 w-20 h-9 pageIndex select-none', // Clase CSS para el enlace "Siguiente"
                    'pageCssClass' => 'rounded-md shadow-sm bg-neutral-900 w-9 h-9 pageIndex', // Clase CSS para los enlaces de página
                    'activePageCssClass' => 'rounded-md shadow-sm w-9 h-9 pageIndex activePage', // Clase CSS para la página actual
                ]);
            }
            ?>
        </div>
    </div>
</div>