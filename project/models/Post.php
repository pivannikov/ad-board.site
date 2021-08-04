<?php


namespace Project\Models;


use Core\Model;

class Post extends Model
{
    public function getById($id)
    {
        return $this->findOne("
            SELECT p.id, p.category_id, p.title, p.body, p.author_name, p.contact, p.created_at, c.title AS category, c.slug as category_slug FROM posts p 
            JOIN categories c ON p.category_id=c.id
            WHERE p.id=$id");
    }

    public function getAll()
    {
        return $this->findMany("SELECT * FROM posts");
    }

    public function getByRandom($quantity)
    {
        return $this->findMany("SELECT * FROM posts ORDER BY rand() LIMIT $quantity");
    }

}