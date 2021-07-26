<?php


namespace Project\Controllers;


use Core\Controller;
use Project\Models\Post;
use Project\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $this->title = 'Welcome page';

        $posts = (new Post)->getByRandom(2);
        return $this->renderTemplate('home', ['posts' => $posts]);
    }
}

