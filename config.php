<?php
session_start();
define('BURL','http://127.0.0.1/medical_serv/');
define('BURLA','http://127.0.0.1/medical_serv/admin/');
define('ASSETS','http://127.0.0.1/medical_serv/assets');
define('BL',__DIR__.'/');
define('BLA',__DIR__.'/admin/');
//connect to db
require_once(BL.'functions/db.php');