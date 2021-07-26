<?php
namespace Core;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

spl_autoload_register(function($class) {
    preg_match('#(.+)\\\\(.+?)$#', $class, $match);

    $nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1]));
    $className = $match[2];

    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($path)) {
        require_once $path;

        if (class_exists($class, false)) {
            return true;
        } else {
            throw new \Exception("Class $class does not found in file $path. Check the class name.");
        }
    } else {
        throw new \Exception("For class $class does not foumd file $path.");
    }
});


$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';

$track = ( new Router ) -> getTrack($routes, $_SERVER['REQUEST_URI']);
$page  = ( new Dispatcher ) -> getPage($track);

# twig
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/project/views');
$twig = new \Twig\Environment($loader);
echo $twig->render($page->view . '.html', $page->data);


