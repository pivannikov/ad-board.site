<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Post;
use Project\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = (new Post())->getAll();
        return $this->renderTemplate('posts/index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = (new Post())->getById($id['var']);
        $tags = (new Tag())->getTagsByPost($id['var']);
        return $this->renderTemplate('posts/show', ['post' => $post, 'tags' => $tags]);
    }
}