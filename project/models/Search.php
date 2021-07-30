<?php


namespace Project\Models;


use Core\Model;

class Search extends Model
{
    public function searchRequest($search_query)
    {
        return $this->findMany("
            SELECT * FROM posts p 
            WHERE p.title LIKE '%$search_query%' OR p.body LIKE '%$search_query%'
        ");
    }
}