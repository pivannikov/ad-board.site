<?php


namespace Project\Models;


use Core\Model;

class Post extends Model
{
    public function getById($id)
    {
        return $this->findOne("SELECT * FROM posts WHERE id=$id");
    }

    public function getAll()
    {
        return $this->findMany("SELECT * FROM posts");
    }

    public function getByRandom($quantity)
    {
        return $this->findMany("SELECT * FROM cars-blog.posts ORDER BY rand() LIMIT $quantity");
    }
}