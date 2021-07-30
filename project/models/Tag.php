<?php


namespace Project\Models;


use Core\Model;

class Tag extends Model
{

    public function getAll()
    {
        return $this->findMany("SELECT * FROM tags");
    }

    public function getTagsByPost($post_id)
    {
        return $this->findMany("
            SELECT t.id, t.title FROM tags t 
            JOIN posts_tags pt ON t.id=pt.tag_id
            JOIN posts p ON pt.post_id=p.id
            WHERE p.id=$post_id
        ");
    }

    public function getPostsByTag($tag_id)
    {
        return $this->findMany("
            SELECT p.id, c.title AS category, p.title, p.body, p.created_at, t.title AS tag FROM posts p 
                JOIN posts_tags pt ON p.id=pt.post_id 
                JOIN tags t ON pt.tag_id=t.id
                JOIN categories c ON c.id=p.category_id
                WHERE pt.id=$tag_id
        ");
    }
}