<?php

namespace App\Controllers;

class AdminController{
    public function index()
  {
    loadView('admin/dashboard');
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
}