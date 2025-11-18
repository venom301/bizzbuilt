<?php

namespace App\Controllers;

use Framework\Router;
use Framework\Database;

class CategoriesController
{

    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function display()
    {
        loadView('categories');
    }

    public function readmore($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $article = $this->db->query("SELECT * FROM blog_origin WHERE id = :id", $params)->fetchAll();

        loadView('extra-pages/readmore', [
            'articles' => $article
        ]);
    }
}