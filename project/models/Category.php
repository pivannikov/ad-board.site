<?php


namespace Project\Models;


use Core\Model;

class Category extends Model
{
    public function getById($slug)
    {
        return $this->findOne("SELECT * FROM categories WHERE slug=$slug");
    }

    public function getAll()
    {
        return $this->findMany("SELECT * FROM categories");
    }

    public function getPostsByCategory($slug)
    {
        return $this->findMany("
            SELECT p.id, p.category_id, p.title, p.body, p.created_at, c.title as category, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON c.id=p.category_id
            WHERE c.slug='$slug'
        ");
    }

}