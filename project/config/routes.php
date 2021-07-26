<?php

use Core\Route;

return [
	new Route('', 'home', 'index'),
	new Route('/posts', 'Post', 'index'),
	new Route('/post/:var', 'Post', 'show'),
	new Route('/categories/', 'Category', 'index'),
	new Route('/category/:var', 'Category', 'show'),
    new Route('/tags', 'Tag', 'index'),
	new Route('/tag/:var', 'Tag', 'show'),
];
	
