<?php
namespace App\Controllers;
use Framework\Database;

class HomeController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index()
    {
        $article = $this->db->query("SELECT * FROM blog_origin")->fetchAll();
        loadView('home', [
            'articles' => $article
        ]);
    }

}
