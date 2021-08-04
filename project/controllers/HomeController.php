<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Post;
use Project\Models\Tag;


class HomeController extends Controller
{
    public function index()
    {
        $this->title = 'Home';
        $posts = (new Post)->getByRandom(6);
        $tags = (new Tag)->getAll();
        return $this->renderTemplate('home', ['posts' => $posts, 'tags' => $tags, 'title' => $this->title]);
    }

}

