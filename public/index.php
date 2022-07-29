<?php
require_once '../vendor/autoload.php';
session_start();

if ($_SERVER['REQUEST_URI'] == '/home'){
    require_once "../app/controllers/homepage.php";
}
exit;

