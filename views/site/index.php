<?php
    /** @var yii\web\View $this */
    $this->title = 'Soft Library';
?>
<div class="site-index">

    <!-- SPLASH -->
    <div class="w-full overflow-hidden rounded-md h-80 relative" style="background-image: url('https://www.resourcifi.com/blog/wp-content/uploads/2022/12/How-Much-Does-it-Cost-to-Develop-Custom-Software_-2.jpg');
        background-size: cover;
        background-position: center;">
        <div class="grid grid-cols-3 h-full items-center justify-center">
            <div class="px-2 text-center h-max">
                <h1 class="text-white text-2xl font-bold">Encuentra una gran variedad de Software</h1>
                <h1 class="text-white text-md font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum aperiam explicabo dolorem necessitatibus quis tempore commodi in! Similique fugiat ducimus voluptatem, enim quod, asperiores alias, esse eum dolorum id tempora?</h1>
            </div>
        </div>

        <div class="rounded-md absolute top-8 right-8 w-44">
            <div class="software_overview relative cursor-pointer">
                <span class="text-sm text-white absolute rounded-r bg-neutral-800 shadow px-2 top-4 select-none">
                    Licenciado
                </span>

                <div class="software_overview-image rounded-md overflow-hidden shadow-sm">
                    <img src="<?= Yii::getAlias('@web/imgs/office_365_caratula.webp') ?>" alt="office_365_lincencia">
                </div>
            </div>
        </div>

        <div class="rounded-md absolute top-8 right-56 w-44">
            <div class="software_overview relative cursor-pointer">
                <span class="text-sm text-white absolute rounded-r bg-neutral-800 shadow px-2 top-4 select-none">
                    Licenciado
                </span>

                <div class="software_overview-image rounded-md overflow-hidden shadow-sm">
                    <img src="<?= Yii::getAlias('@web/imgs/office_365_caratula_2.jpg') ?>" alt="office_365_lincencia">
                </div>
            </div>
        </div>
    </div>

    <!--- ENDED --->
    <h1 class="text-2xl font-bold mt-3 mb-4">Software de Oficina</h1>

    <div class="grid grid-cols-6 gap-4 mb-2">
        <?php if (isset($oficina)) : ?>
            <?php foreach ($oficina as $dato) : ?>
                <div class="software_content rounded-md">
                    <div class="software_overview relative cursor-pointer">
                        <span class="text-sm text-white absolute rounded-r bg-neutral-800 shadow px-2 top-4 select-none">
                            <?= isset($dato["nombre_licencia"]) ? $dato["nombre_licencia"] : 'Sin información' ?>
                        </span>

                        <div class="software_overview-image rounded-md overflow-hidden shadow-sm">
                            <img src="<?= $dato['fotografia'] ?>" alt="office_365_lincencia">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="text-center my-4">
        <a href="<?= Yii::getAlias("@web") ?>/listado" class="text-xl text-neutral-700 hover:text-neutral-500">Ver más</a>
    </div>

    <!-- ENDED -->
    <div class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
        <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
            <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
            <defs>
                <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                    <stop stop-color="#7775D6" />
                    <stop offset="1" stop-color="#E935C1" />
                </radialGradient>
            </defs>
        </svg>
        <div class="max-w-md text-center lg:mx-0 lg:flex-auto lg:py-10 lg:text-left">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Boost your productivity.<br>Start using our app today.</h2>
            <p class="mt-6 text-lg leading-8 text-gray-300">Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla.</p>
            <a href="#" class="rounded-md bg-white px-3.5 py-2.5 mt-5 block text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                Ver Biblioteca
            </a>
        </div>
        <div class="relative mt-16 h-80 lg:mt-8">
            <img class="absolute left-0 top-0 w-[45rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="<?= Yii::getAlias('@web/imgs/app_scaled.jpg') ?>" alt="App screenshot" width="1524" height="800">
        </div>
    </div>

    <!--- ENDED --->

    <h1 class="text-2xl font-bold mt-3 mb-4">Software de Edición</h1>

    <div class="grid grid-cols-6 gap-4 mb-2">
        <?php if (isset($edicion)) : ?>
            <?php foreach ($edicion as $dato) : ?>
                <div class="software_content rounded-md">
                    <div class="software_overview relative cursor-pointer">
                        <span class="text-sm text-white absolute rounded-r bg-neutral-800 shadow px-2 top-4 select-none">
                            <?= isset($dato["nombre_licencia"]) ? $dato["nombre_licencia"] : 'Sin información' ?>
                        </span>
                        <div class="software_overview-image rounded-md overflow-hidden shadow-sm">
                            <img src="<?= $dato['fotografia']?>" alt="office_365_lincencia">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="text-center mt-4">
        <a href="<?= Yii::getAlias("@web") ?>/listado" class="text-xl text-neutral-700 hover:text-neutral-500">Ver más</a>
    </div>

    <!--- ENDED --->
    <div class="relative isolate overflow-hidden rounded-xl bg-gray-900 py-16 sm:py-19 mt-4">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-2">
                <div class="max-w-xl lg:max-w-lg">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Subscribe to our newsletter.</h2>
                    <p class="mt-4 text-lg leading-8 text-gray-300">Nostrud amet eu ullamco nisi aute in ad minim nostrud adipisicing velit quis. Duis tempor incididunt dolore.</p>
                    <div class="mt-6 flex max-w-md gap-x-4">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" placeholder="Enter your email">
                        <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
                    </div>
                </div>
                <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                    <div class="flex flex-col items-start">
                        <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                        </div>
                        <dt class="mt-4 font-semibold text-white">Weekly articles</dt>
                        <dd class="mt-2 leading-7 text-gray-400">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
                    </div>
                    <div class="flex flex-col items-start">
                        <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002" />
                            </svg>
                        </div>
                        <dt class="mt-4 font-semibold text-white">No spam</dt>
                        <dd class="mt-2 leading-7 text-gray-400">Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt anim.</dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 blur-3xl xl:-top-6" aria-hidden="true">
            <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</div>