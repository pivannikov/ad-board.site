<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Category;
use Project\Models\Post;


class HomeController extends Controller
{
    public function index()
    {
        $posts = (new Post)->getByRandom(3);
        return $this->renderTemplate('home', ['posts' => $posts]);
    }


}

