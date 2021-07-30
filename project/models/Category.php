<?php


namespace Project\Models;


use Core\Model;

class Category extends Model
{
    public function getById($id)
    {
        return $this->findOne("SELECT * FROM categories WHERE id=$id");
    }

    public function getAll()
    {
        return $this->findMany("SELECT * FROM categories");
    }

    public function getPostsByCategory($id)
    {
        return $this->findMany("SELECT * FROM posts WHERE category_id=$id");
    }

}