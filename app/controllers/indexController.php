<?php

namespace App\controllers;

use League\Plates\Engine;
use App\QueryBuilder;

class indexController{
    private $templates;
    private $db;
    public function __construct()
    {
        $this->templates = new Engine('../app/templates');
        $this->db = new QueryBuilder();
    }


    public function main($vars){

         echo $this->templates->render('home', ['name' => 'Jonathan', 'age' => 12]);

     }
    public function users($vars){
        $data = $this->db->getAll('category');
        echo $this->templates->render('about', ['posts' => $data]);

    }
}