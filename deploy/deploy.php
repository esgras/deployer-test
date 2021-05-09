<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'dep_test');

// Project repository
set('repository', 'https://github.com/esgras/deployer-test.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

//host('project.com')
//    ->set('deploy_path', '~/{{application}}');

host('secret.test')
    ->stage('staging')
    ->set('deploy_path', '/var/www/vagrant.test');

localhost('localhost')
    ->stage('test')
    ->set('deploy_path', '~');
    

// Tasks
//
//task('test', function() {
//    writeln("Hello, World");
//});
//
//task('whoami', function() {
//    $whoami = run('whoami');
//    writeln("Whoami: " . $whoami);
//});
//

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
