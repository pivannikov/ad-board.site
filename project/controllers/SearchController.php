<?php
declare(strict_types=1);

namespace Project\Controllers;


use Core\Controller;
use Project\Models\Search;

class SearchController extends Controller
{
    private array $array_result = [];

    public function searchResult()
    {
        $this->title = 'Search';
        if (!empty($_POST['query'])) {
            $search_query = $_POST['query'];
            $search_query = trim($search_query);
            $posts = (new Search())->searchRequest($search_query);
            return $this->renderTemplate('search/results', ['posts' => $posts, 'title' => $this->title, 'search_text' => $search_query]);
        }
        else {
            return $this->renderTemplate('search/results');
        }
    }

}





