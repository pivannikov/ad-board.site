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
        $this->title = "All announcements";
        $posts = (new Post())->getAll();
        $tags = (new Tag)->getAll();
        return $this->renderTemplate('posts/index', ['posts' => $posts, 'tags' => $tags, 'title' => $this->title]);
    }

    public function show($id)
    {
        $this->title = "Announcement №" . $id['var'];
        $post = (new Post())->getById($id['var']);
        $tags = (new Tag())->getTagsByPost($id['var']);
        return $this->renderTemplate('posts/show', ['post' => $post, 'tags' => $tags, 'title' => $this->title]);
    }
}