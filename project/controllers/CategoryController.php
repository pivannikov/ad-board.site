<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = (new Category())->getAll();
        return $this->renderTemplate('categories/index', ['categories' => $categories]);
    }

    public function show($id)
    {
        $posts = (new Category())->getPostsByCategory($id['var']);
        return $this->renderTemplate('categories/show', ['posts' => $posts]);
    }
}