<?php
require_once('config/db.config.php');
require_once('config/main.config.php');

require_once('classes/db.class.php');
DB::init($user, $password, $dbname, $host, $charset);

require_once('classes/route.class.php');
Route::init();