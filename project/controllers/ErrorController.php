<?php
namespace Project\Controllers;
use \Core\Controller;

class ErrorController extends Controller
{
	public function notFound() {
		$this->title = 'Not found';

		return $this->renderTemplate('error/404', ['title' => $this->title]);
	}
}
