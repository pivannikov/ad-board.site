<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Category;
use Project\Models\Tag;

class CategoryController extends Controller
{
    public function index()
    {
        $this->title = 'All categories';
        $categories = (new Category())->getAll();
        return $this->renderTemplate('categories/index', ['categories' => $categories, 'title' => $this->title]);
    }


    public function show($slug)
    {
        $this->title = ucfirst($slug['var']);
        $posts = (new Category())->getPostsByCategory($slug['var']);
        $tags = (new Tag)->getTagsByCategory($slug['var']);
        return $this->renderTemplate('posts/index', ['posts' => $posts, 'tags' => $tags, 'title' => $this->title]);
    }
}