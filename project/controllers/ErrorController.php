<?php
namespace Project\Controllers;
use \Core\Controller;

class ErrorController extends Controller
{
	public function notFound() {
		$this->title = 'Page not found';
		
		return $this->renderTemplate('error/notFound');
	}
}
