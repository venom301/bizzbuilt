<?php

namespace App\Controllers;
use Framework\Database;

class AdminController
{

  protected $db;
  public function __construct()
  {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }
  public function index()
  {
    $article = $this->db->query("SELECT * FROM blog")->fetchAll();
    loadView('admin/dashboard', [
      'articles' => $article
    ]);
  }

  public function settings()
  {
    loadView('admin/settings');
  }
  public function users()
  {
    loadView('admin/users');
  }
  public function posts()
  {
    loadView('admin/post');
  }
  public function comments()
  {
    loadView('admin/comments');
  }

  /**
   * edit article
   * @return void
   */
  public function update($params)
  {
    $id = $params['id'] ?? null;

    $params = [
      'id' => $id
    ];

    $article = $this->db->query("SELECT * FROM blog WHERE id = :id", $params)->fetchAll();
    loadView('admin/form-handle/edit', [
      'articles' => $article
    ]);
  }
}