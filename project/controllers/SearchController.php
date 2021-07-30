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
        if (!empty($_POST['query'])) {
            $search_query = $_POST['query'];
            $search_query = trim($search_query);
            $posts = (new Search())->searchRequest($search_query);
//            echo '<pre>';
//            print_r($posts);
//            echo '</pre>';
            return $this->renderTemplate('search/results', ['posts' => $posts]);
        }
        else {
            return $this->renderTemplate('search/results');
        }
    }

    public function searchHighLighter($string, $query)
    {
        if ($string == $query) {

            return '<h1>' . $string . '</h1>';
        } else {
            return $string;
        }
    }

}

