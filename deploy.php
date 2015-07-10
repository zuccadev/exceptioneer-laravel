<?php

require 'recipe/composer.php';

server('prod', 'snugapps.com', 2222)
    ->user('indigo')
    ->password('goindi12')
    ->stage('production')
    ->env('branch', 'master')
    ->env('deploy_path', '/home4/indigo/public_html/exceptioneer');


task('deploy:vendors', function () {
    if (commandExist('composer')) {
        $composer = 'composer';
    } else {
        run("cd {{release_path}} && curl -sS https://getcomposer.org/installer | /opt/php55/bin/php");
        $composer = '/opt/php55/bin/php composer.phar';
    }
    run("cd {{release_path}} && {{env_vars}} $composer {{composer_options}}");
})->desc('Installing vendors');


set('repository', 'git@bitbucket.org:psimone/exceptioneer.git');