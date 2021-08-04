<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Tag;

class TagController extends Controller
{
    public function show($tag)
    {
        $this->title = 'Tag: ' . $tag['var'];
        $posts = (new Tag())->getPostsByTag($tag['var']);
        return $this->renderTemplate('posts/index', ['posts' => $posts, 'title' => $this->title]);
    }
}