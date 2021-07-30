<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Tag;

class TagController extends Controller
{
    public function show($id)
    {
        $posts = (new Tag())->getPostsByTag($id['var']);
        return $this->renderTemplate('tags/show', ['posts' => $posts]);
    }
}