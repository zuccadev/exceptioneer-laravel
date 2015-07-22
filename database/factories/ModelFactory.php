<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function ($faker) {
    return [
        'name' => $faker->company,
        'api_key' => $faker->sha256
    ];
});

$factory->define(App\Notification::class, function ($faker) {
    return [
        'code' => $faker->numberBetween(1,999),
        'exception_class' => $faker->randomElement(['Symfony\Component\HttpKernel\Exception\HttpException', 'InvalidArgumentException']),
        'message' => $faker->randomElement(['', 'This is an exception']),
        'line' => $faker->numberBetween(1,100000),
        'file' => $faker->randomElement([
            '/var/www/exceptioneer/git/public/index.php',
            '/var/www/exceptioneer/git/app/Http/routes.php',
            '/var/www/exceptioneer/git/app/Http/Controllers/MainController.php'
        ]),
        'trace' => $faker->randomElement([
            'a:9:{i:0;a:4:{s:8:"function";s:9:"{closure}";s:5:"class";s:7:"Closure";s:4:"type";s:2:"->";s:4:"args";a:0:{}}i:1;a:4:{s:4:"file";s:67:"/var/www/exceptioneer/git/vendor/illuminate/container/Container.php";s:4:"line";i:502;s:8:"function";s:20:"call_user_func_array";s:4:"args";a:2:{i:0;a:0:{}i:1;a:0:{}}}i:2;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1243;s:8:"function";s:4:"call";s:5:"class";s:30:"Illuminate\Container\Container";s:4:"type";s:2:"->";s:4:"args";a:2:{i:0;a:0:{}i:1;a:0:{}}}i:3;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1217;s:8:"function";s:27:"callActionOnArrayBasedRoute";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:3:{i:0;b:1;i:1;a:1:{i:0;a:0:{}}i:2;a:0:{}}}}i:4;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1138;s:8:"function";s:16:"handleFoundRoute";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:3:{i:0;b:1;i:1;a:1:{i:0;a:0:{}}i:2;a:0:{}}}}i:5;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1370;s:8:"function";s:23:"Laravel\Lumen\{closure}";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:0:{}}i:6;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1144;s:8:"function";s:19:"sendThroughPipeline";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:2:{i:0;a:0:{}i:1;a:0:{}}}i:7;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1084;s:8:"function";s:8:"dispatch";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:7:{s:10:"attributes";a:0:{}s:7:"request";a:0:{}s:5:"query";a:0:{}s:6:"server";a:0:{}s:5:"files";a:0:{}s:7:"cookies";a:0:{}s:7:"headers";a:0:{}}}}i:8;a:6:{s:4:"file";s:42:"/var/www/exceptioneer/git/public/index.php";s:4:"line";i:28;s:8:"function";s:3:"run";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:7:{s:10:"attributes";a:0:{}s:7:"request";a:0:{}s:5:"query";a:0:{}s:6:"server";a:0:{}s:5:"files";a:0:{}s:7:"cookies";a:0:{}s:7:"headers";a:0:{}}}}}',
            'a:5:{i:0;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1143;s:8:"function";s:24:"handleDispatcherResponse";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:1:{i:0;i:0;}}}i:1;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1370;s:8:"function";s:23:"Laravel\Lumen\{closure}";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:0:{}}i:2;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1144;s:8:"function";s:19:"sendThroughPipeline";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:2:{i:0;a:0:{}i:1;a:0:{}}}i:3;a:6:{s:4:"file";s:76:"/var/www/exceptioneer/git/vendor/laravel/lumen-framework/src/Application.php";s:4:"line";i:1084;s:8:"function";s:8:"dispatch";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:7:{s:10:"attributes";a:0:{}s:7:"request";a:0:{}s:5:"query";a:0:{}s:6:"server";a:0:{}s:5:"files";a:0:{}s:7:"cookies";a:0:{}s:7:"headers";a:0:{}}}}i:4;a:6:{s:4:"file";s:42:"/var/www/exceptioneer/git/public/index.php";s:4:"line";i:28;s:8:"function";s:3:"run";s:5:"class";s:25:"Laravel\Lumen\Application";s:4:"type";s:2:"->";s:4:"args";a:1:{i:0;a:7:{s:10:"attributes";a:0:{}s:7:"request";a:0:{}s:5:"query";a:0:{}s:6:"server";a:0:{}s:5:"files";a:0:{}s:7:"cookies";a:0:{}s:7:"headers";a:0:{}}}}}'
        ]),
        'path' => $faker->randomElement([
            '/',
            '/notifications'
        ]),
        'uri' => 'http://localhost/',
        'method' => $faker->randomElement(['GET', 'POST']),
        'client_ip' => $faker->ipv4,
        'user_agent' => $faker->userAgent,
        'time' => $faker->dateTimeThisYear(),
        'stage' => $faker->randomElement(['production', 'staging']),
        'project_id' => 'factory:App\Project'
    ];
});
