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
    $article = $this->db->query("SELECT * FROM blog_origin")->fetchAll();
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
    $article = $this->db->query("SELECT * FROM blog_origin");
    loadView('admin/post', [
      'articles' => $article
    ]);
  }

  /**
   * Summary of comments
   * @return void
   */
  public function comments($params)
  {
    
    $query = "SELECT * FROM comments";
    $comment = $this->db->query($query)->fetchAll();

    loadView('admin/comments', [
      'comments' => $comment
    ]);
  }

  /**
   * create post
   * @param mixed $params
   * @return void
   */
  public function create($params)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = $_POST['title'];
      $category = $_POST['category'];
      $author = $_POST['author'];
      $content = $_POST['content'];

      require_once basePath('public/upload.php');

      $imageData = uploadImage();

      $columns = ['title', 'category', 'author', 'content'];
      $placeholders = [':title', ':category', ':author', ':content'];
      $params = [
        'title' => $title,
        'category' => $category,
        'author' => $author,
        'content' => $content,
        'image_path' => $imageData
      ];

      $query = "INSERT INTO blog_origin(title, category, author, content, image_path) VALUES(:title, :category, :author, :content, :image_path);";

      $this->db->query($query, $params);

      redirect('/admin');
    }
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
      $full_content = $_POST['full_content'] ?? '';
      $tags = $_POST['tags'] ?? '';

      require basePath('public/upload.php');

      $imageData = uploadImage();

      $updateParams = [
        'id' => $id,
        'title' => $title,
        'category' => $category,
        'content' => $content,
        'full_content' => $full_content,
        'tags' => $tags
      ];

      $query1 = "UPDATE blog_origin SET title = :title, category = :category, content = :content, full_content = :full_content";
      if ($imageData) {
        $query1 .= ", image_path = :image";
        $updateParams['image'] = $imageData;
      }
      $query1 .= " WHERE id = :id";

      // $query2 = "UPDATE tags SET tags = :tags";

      $this->db->query($query1, $updateParams);
      // $this->db->query($query2, $tags);

      // Redirect back to admin dashboard
      header('Location: /admin');
      exit;
    } else {
      // GET: displays edit page with details
      $id = $params['id'] ?? null;

      $params = [
        'id' => $id
      ];

      $article = $this->db->query("SELECT * FROM blog_origin WHERE id = :id", $params)->fetchAll();
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

      $this->db->query("SELECT * FROM blog_origin WHERE id = :id", $params);

      if (isset($request) && $request === 'delete') {

        $this->db->query("DELETE FROM blog_origin WHERE id = :id", $params);

        redirect('/admin');
      }
    }
  }

}