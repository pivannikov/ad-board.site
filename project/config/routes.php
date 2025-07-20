<?php

use Core\Route;

return [
	new Route('', 'Home', 'index'),
	new Route('/posts', 'Post', 'index'),
	new Route('/post/:var', 'Post', 'show'),
	new Route('/categories', 'Category', 'index'),
	new Route('/category/:var', 'Category', 'show'),
	new Route('/tag/:var', 'Tag', 'show'),
	new Route('/search', 'Search', 'searchResult'),
];
	
