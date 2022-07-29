<?php
require_once '../vendor/autoload.php';

use League\Plates\Engine;


$templates = new Engine('../app/templates');

// Render a template
echo $templates->render('about', ['name' => 'phplivesmater']);