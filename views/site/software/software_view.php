<?php
    use yii\bootstrap5\ActiveForm;
    $this->title = $software->nombre;
?>

<div class="px-10 py-5 min-vh-100">

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="<?= Yii::getAlias('@web/')?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    Principio
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="<?= Yii::getAlias('@web/softwares')?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Software</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?= $this->title?></span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-3 gap-4">
        <div class="flex gap-4 bg-white rounded-md shadow-sm col-span-2 px-3 py-4">
            <div class="min-w-max h-[250px] bg-red-300">
                <img src="<?= Yii::getAlias('@web/'.$software->fotografia) ?>" class="w-full h-full object-contain rounded-md" alt="<?= $software->nombre ?>">
            </div>

            <div class="flex flex-col space-y-2">
                <h1 class="text-2xl w-full font-semibold"><?= $software->nombre ?></h1>
                <div class="flex flex-wrap gap-2 py-2 font-light">
                    <span class="bg-green-700 rounded-md p-1 text-white"><?= $software->categoria_nombre?></span>
                    <span class="bg-blue-700 rounded-md p-1 text-white"><?= $software->licencia?></span>
                    <span class="bg-amber-700 rounded-md p-1 text-white">v. <?= $software->version?></span>
                    <span class="bg-neutral-700 rounded-md p-1 text-white">Lanzado en el <?= $software->fecha_lanzamiento?></span>
                </div>

                <span class="text-3xl font-semibold font-neutral-700">$ <?= number_format($software->precio, 2,'.',',')?></span>

                <div class="flex flex-col">
                    <h3 class="text-lg font-semmibold text-neutral-800">Descripcion</h3>
                    <p class="w-full font-light"><?= $software->descripcion ?></p>
                    <h3 class="text-lg font-semmibold text-neutral-800">Requisitos</h3>
                    <p class="w-full font-light"><?= $software->requisitos ?></p>
                </div>
            </div>


        </div>

        <div class="bg-white rounded-md shadow-sm px-3 py-4 h-max col-span-1">
            <h3 class="text-lg font-bold text-neutral-800">Datos del Desarrolador</h3>
            <span class="w-full font-semibold"><?= $software->desarrollador_nombre ?></span>
            <p class="w-full font-light"><?= $software->biografia ?></p>
            <a class="w-full font-light mb-3 block text-blue-700" href="<?= $software->desarrollador_nombre ?>">Sitio web del desarrollador</a>
            <div>
                <?php $form = ActiveForm::begin(['action' => ['software/agregar-favorito/'.$software->id.''], 'method' => 'post']) ?>
                <button class="flex gap-x-2 rounded-md bg-neutral-900 text-white w-full py-2 px-3 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                    <span>Añadir software a favoritos</span>
                </button>
                <?php ActiveForm::end()?>
            </div>
        </div>
    </div>
</div>

