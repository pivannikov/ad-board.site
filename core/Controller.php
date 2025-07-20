<?php
namespace Core;

class Controller extends \stdClass
{

    protected function renderTemplate($view, $data = []) {
        return new Page($this->title, $view, $data);
    }
}