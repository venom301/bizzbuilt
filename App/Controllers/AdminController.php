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
    $article = $this->db->query("SELECT * FROM blog");
    loadView('admin/post', [
      'articles' => $article
    ]);
  }
  public function comments()
  {
    loadView('admin/comments');
  }

  public function create($params)
  {
    // if (isset($request) && $request === 'put') {
    //   $request = $_GET['_method'];

    //   if ($_SERVER['REQUEST_METHOD'] === strtoupper($request)) {
    //     $title = $_POST['title'];
    //     $category = $_POST['category'];
    //     $author = $_POST['author'];
    //     $image = $_POST['image'];
    //     $content = $_POST['content'];

    //     $params = [
    //       'title' => $title,
    //       'category' => $category,
    //       'author' => $author,
    //       'image_path' => $image,
    //       'content' => $content
    //     ];

    //     $article = $this->db->query("INSERT INTO blog (title, category, author, image_path, content) VALUES (:title, :category, :author, :image_path, :content)", $params);

    //     loadView('admin', [
    //       'articles' => $article
    //     ]);
    //   }
    // }

    loadView('admin');
  }

  /**
   * edit article
   * @return void
   */
  public function update($params)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Handle POST: update the article
      $id = $_POST['id'] ?? null;
      $title = $_POST['title'] ?? '';
      $category = $_POST['category'] ?? '';
      $content = $_POST['content'] ?? '';
      // $tags = $_POST['tags'] ?? '';

      $imageData = null;
      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        $imageContent = file_get_contents($imageTmp);
        $imageData = 'data:' . $imageType . ';base64,' . base64_encode($imageContent);
      }

      $updateParams = [
        'id' => $id,
        'title' => $title,
        'category' => $category,
        'content' => $content
        // 'tags' => $tags
      ];

      $query = "UPDATE blog SET title = :title, category = :category, content = :content";
      if ($imageData) {
        $query .= ", image_path = :image";
        $updateParams['image'] = $imageData;
      }
      $query .= " WHERE id = :id";

      $this->db->query($query, $updateParams);

      // Redirect back to admin dashboard
      header('Location: /admin');
      exit;
    } else {
      // GET: displays edit page with details
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

  /**
   * delete post
   * @return void
   */
  public function delete($params)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $request = $_POST['_method'];

      $id = $params['id'] ?? '';

      $params = [
        'id' => $id
      ];

      $article = $this->db->query("SELECT * FROM blog WHERE id = :id", $params);

      if (isset($request) && $request === 'delete') {

        $this->db->query("DELETE FROM blog WHERE id = :id", $params);

        loadView('admin', [
          'articles' => $article
        ]);
      }
    }
  }

}