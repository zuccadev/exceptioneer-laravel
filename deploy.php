<?php

if (!file_exists('deploy-config.php')) {
    exit('No SSH config file found');
}

$sshConfig = require 'deploy-config.php';

require 'recipe/common.php';

set('shared_dirs', ['public/uploads']);
server('prod', 'web461.webfaction.com', 22)
    ->user('zzdev')
    ->identityFile($sshConfig['public'], $sshConfig['private'], $sshConfig['passphrase'])
    ->stage('webfaction')
    ->env('branch', 'master')
    ->env('deploy_path', '/home/zzdev/webapps/exceptioneer_src');

task('deploy:vendors', function () {
    if (commandExist('composer')) {
        $composer = 'composer';
    } else {
        run("cd {{release_path}} && curl -sS https://getcomposer.org/installer | php55");
        $composer = 'php55 composer.phar';
    }

    run("cd {{release_path}} && {{env_vars}} $composer {{composer_options}}");

})->desc('Installing vendors');


task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');
after('deploy', 'success');

set('repository', 'git@bitbucket.org:psimone/exceptioneer.git');