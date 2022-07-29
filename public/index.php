<?php
require_once '../vendor/autoload.php';

use League\Plates\Engine;


$templates = new Engine('../app/templates');

d($templates);