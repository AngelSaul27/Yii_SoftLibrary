<?php use yii\bootstrap5\ActiveForm;

$this->title = 'Carousel' ?>

<div class="flex flex-col min-vh-100 px-10 py-5">

    <a class="bg-green-700 text-white rounded-md px-3 py-2 shadow mb-3 block w-max"
       href="<?= Yii::getAlias('@web/administrador/carousel/create')?>">
        Crear
    </a>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Sitio</th>
            <th scope="col">Fotografia</th>
            <th scope="col">Fecha inicio</th>
            <th scope="col">Fecha final</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($model) && count($model) > 0) : ?>
            <?php foreach ($model as $item) : ?>
                <tr>
                    <th>
                        <span class="font-light"><?= $item['id']; ?></span>
                    </th>
                    <th>
                        <span class="font-light"><?= $item['nombre']; ?></span>
                    </th>
                    <th>
                        <span class="font-light"><?= $item['page_name']; ?></span>
                    </th>
                    <th>
                        <div class="w-[100px] h-[100px]">
                            <img class="w-full h-full object-contain mx-auto" src="<?= Yii::getAlias('@web/').$item['imagen']; ?>" alt="<?= $item['nombre'] ?>">
                        </div>
                    </th>
                    <th>
                        <span class="font-light"><?= $item['fecha_inicio']; ?></span>
                    </th>
                    <th>
                        <span class="font-light"><?= $item['fecha_final']; ?></span>
                    </th>
                    <th>
                        <div class="flex gap-2 font-light">
                            <a class="hover:text-blue-700" href="<?= Yii::getAlias('@web/administrador/carousel/'.$item['id'].'/edit')?>">
                                Editar
                            </a>
                            <?php $form = ActiveForm::begin(['action' => '/administrador/carousel/'.$item['id'].'/delete']) ?>
                            <button type="submit" class="hover:text-red-700">
                                Eliminar
                            </button>
                            <?php ActiveForm::end() ?>
                        </div>
                    </th>
                </tr>
            <?php endforeach;  ?>
        <?php else : ?>
            <tr>
                <th colspan="9" class="py-5 text-center">
                    <p class="text-slate-800 font-bold">Sin informacion</p>
                    <p class="text-gray-700 font-light">No se encontraron registros disponibles</p>
                </th>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>

