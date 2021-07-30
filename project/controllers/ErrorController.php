<?php
namespace Project\Controllers;
use \Core\Controller;

class ErrorController extends Controller
{
	public function notFound() {

		return $this->renderTemplate('error/notFound');
	}
}
