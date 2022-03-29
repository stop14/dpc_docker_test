<?php
$databases['default']['default'] = [
   'database' => 'drupal_default',
   'username' => 'drupal_default',
   'password' => 'password',
   'host' => 'mariadb',
   'port' => '3306',
   'driver' => 'mysql',
   'prefix' => '',
   'collation' => 'utf8mb4_general_ci',
 ];

$settings['file_temp_path'] = '/tmp';
$settings['config_sync_directory'] = '/var/www/drupal/config/sync';
