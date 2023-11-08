<?php use yii\bootstrap5\ActiveForm;

$this->title = 'Lista de Favoritos' ?>

<div class="px-10 py-5 min-vh-100 flex flex-col gap-y-3">
    <?php

    if(isset($favoritos) && count($favoritos) > 0){
        foreach ($favoritos as $software){
            echo '
                <div class="flex justify-between items-center bg-white rounded-md shadow-sm py-2 px-3 gap-3">
                    <div class="h-[70px] w-max min-w-max">
                        <img class="w-full h-full object-contain" src="'.Yii::getAlias('@web/').$software['soft_fotografia'].'" alt="'.$software['soft_nombre'].'">
                    </div>           
                    <div class="flex flex-col items-center justify-content-center w-full ">
                        <div class="flex justify-between items-center w-full">
                            <p>Nombre: '.$software['soft_nombre'].'</p>
                        </div>
                        <div class="flex justify-between items-center w-full font-light text-gray-600">
                            <p>Categoia: '.$software['soft_categoria'].'</p>
                            <p>Licencia: '.$software['soft_licencia'].'</p>
                            <p>Versión: '.$software['soft_version'].'</p>
                            <p>Lanzamiento: '.$software['soft_fecha_lanzamiento'].'</p>
                        </div>
                    </div>
                 
                    <p class="min-w-max font-semibold text-lg">$ '.number_format($software['soft_precio'], 2, '.', ',').' MXN</p>
                    
                    <div class="flex flex-col gap-1">
                        <form action="/software/eliminar-favorito/'.$software['id'].'" method="post">
                            <input type="hidden" name="_csrf" value="'.Yii::$app->request->getCsrfToken().'" />
                            <button type="submit" class="hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                        <a class="hover:text-blue-700" target="_blank" href="'.Yii::getAlias('@web/software/'.$software['soft_id']).'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
            ';
        }
    }else{
        echo '<div class="text-center"><h1 class="text-2xl font-bold">Aun no añades nada aquí</h1><p>Empieza explorando algunos softwares <a class="text-blue-700" href="'.Yii::getAlias('@web/softwares').'">aquí</a></p></div>';
    }

    ?>
</div>