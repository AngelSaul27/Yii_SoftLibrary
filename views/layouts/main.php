<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use yii\bootstrap5\Html;
use webvimark\modules\UserManagement\UserManagementModule;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <?php $this->beginBody() ?>

    <header id="header" class="px-5 bg-white shadow-md">
        <div class="flex gap-4 justify-between items-center">
            <a href="<?= Yii::$app->homeUrl ?>" class="flex flex-col text-sm font-light py-2 min-w-max">
                <div class="flex gap-2 items-end">
                    <img src='<?= Yii::getAlias('@web/imgs/librarything.svg') ?>' class="w-10 h-10"  alt=""/>
                    <h1 class="text-2xl font-bold uppercase">ibrary Soft</h1>
                </div>
                <span class="text-gray-400">Bibloteca de Aplicaciónes</span>
            </a>
            <!-- SEARCH -->
            <div class="flex w-full">
                <button class="flex gap-2 items-center border-1 rounded-l p-1 text-amber-700 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    <span>Menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <input type="text" class="outline-none rounded-r border-r border-t border-b px-4 py-2 w-full" placeholder="No disponible temporalmente "/>
            </div>
            <!-- URLS SESSION -->

            <?php if(!Yii::$app->user->isGuest) : ?>
                <div class="flex gap-3 items-center">
                    <div class="flex flex-col">
                        <span class="text-[13px] font-bold text-uppercase">Bienvenido</span>
                        <span class="text-[11px] font-semibold text-uppercase"><?= key(Role::getUserRoles(Yii::$app->user->id))?></span>
                    </div>

                    <button data-dropdown-toggle="menu_toggle" data-dropdown-placement="bottom-end"  class="p-2 rounded-md shadow-sm bg-slate-900 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>
                    </button>

                    <div id="menu_toggle" class="z-10 hidden bg-slate-900 rounded-lg shadow w-max divide-y divide-slate-800 top-20">
                        <?php if(key(Role::getUserRoles(Yii::$app->user->id)) === 'Admin') : ?>
                            <ul class="py-2 text-sm text-gray-700">
                                <li>
                                    <a href="<?= Yii::getAlias('/administrador')?>" class="block px-4 py-2 hover:bg-slate-800 text-white">Dashboard</a>
                                </li>
                                <li>
                                    <button class="block px-4 py-2 hover:bg-slate-800 text-white w-full text-start" data-dropdown-toggle="forms_down" data-dropdown-placement="left-start">
                                        <span>Biblioteca</span>
                                    </button>
                                    <div id="forms_down" class="z-10 hidden bg-slate-900 divide-y divide-gray-100 rounded-lg shadow w-max">
                                        <ul class="py-2 text-sm text-gray-700">
                                            <li>
                                                <a href="<?= Yii::getAlias('@web/administrador/form/software')?>" class="block px-4 py-2 hover:bg-slate-800 text-white">Registro de software</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-slate-800 text-white">Registro de licencias</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-slate-800 text-white">Registro de categoria</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-slate-800 text-white">Registro de usuarios</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <button class="block px-4 py-2 hover:bg-slate-800 text-white w-full text-start" data-dropdown-toggle="tables_down" data-dropdown-placement="left-start">
                                        <span>Seguridad</span>
                                    </button>
                                    <div id="tables_down" class="z-10 hidden bg-slate-900 divide-y divide-gray-100 rounded-lg shadow w-max">
                                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="double">
                                            <?php
                                            foreach((UserManagementModule::menuItems() )as $items){
                                                echo '<li><a class="block px-4 py-2 hover:bg-slate-800 text-white" href="'.($items['url'][0]) .'">'.($items['label']).'</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php elseif (isset($role)) : ?>
                            <ul class="py-2 text-sm text-gray-700">
                                <li>
                                    <a href="<?= Yii::getAlias('/usuario')?>" class="block px-4 py-2 hover:bg-slate-800 text-white">Dashboard</a>
                                </li>
                            </ul>
                        <?php endif;?>
                        <form class="block px-4 py-2 hover:bg-slate-800 text-white w-full text-start rounded-b-lg" method="post" action="<?= Yii::getAlias('@web/logout')?>" href="<?= Yii::getAlias('@web/logout')?>">
                            <?= Html::input('hidden',Yii::$app->request->csrfParam,Yii::$app->request->csrfToken)?>
                            <button type="submit" class="text-sm">
                                Cerrar sesion
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <!-- SESSION -->
            <?php if(Yii::$app->user->isGuest) : ?>
                <ul class="flex items-center gap-3 min-w-max">
                    <li>
                        <a href="<?= Yii::getAlias('@web/login')?>" class="py-2 bg-slate-200 rounded-md shadow-sm px-3">
                            <span class="text-slate-700">Ingresar</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::getAlias('@web/register')?>" class="flex items-center gap-1 bg-slate-900 px-3 py-2 rounded-md shadow text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <span class="font-semibold text-md ">
                        Registrate
                    </span>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </header>

    <main id="main" role="main" style="min-height: calc(100vh - 200px)">
        <?= Alert::widget() ?>
        <?= $content ?>
    </main>

    <footer class="flex items-center justify-center bg-neutral-900 px-8 py-3 shadow antialiased">
        <p class="text-sm text-center text-gray-400">
            <a href="#" class="hover:underline" target="_blank">Library Soft</a>
            <span class="ml-1">All rights reserved 2023.</span>
        </p>
    </footer>

    <?php $this->endBody() ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>
<?php $this->endPage() ?>