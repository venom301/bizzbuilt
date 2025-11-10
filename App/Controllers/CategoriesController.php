<?php

namespace App\Controllers;

use Framework\Router;

class CategoriesController{
    
public function display(){
    loadView('categories');
}

public function readmore(){
    loadView('extra-pages/readmore');
}
}