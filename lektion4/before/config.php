<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  session_start();

  define('ROOT_PATH', dirname(__FILE__));

  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'portfolio');
  define('DB_HOST', 'localhost');

  date_default_timezone_set('Europe/Stockholm');

  require_once(ROOT_PATH.'/includes.php');
