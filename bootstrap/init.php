<?php
session_start();
include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "libs/helpers.php";

try {
    $pdo = new PDO("mysql:host=$database_config->host;dbname=$database_config->db",$database_config->user,$database_config->pass);
} catch (\PDOException $e) {
    diePage("failed to connect to mysql". $e ->getMessage());
    die();
}
include BASE_PATH . "libs/lib-validation.php";
include BASE_PATH . "libs/lib-auth.php";
include BASE_PATH . "libs/lib-tasks.php";



