<?php
namespace Core;

class Controller
{

    protected function renderTemplate($view, $data = []) {
        return new Page($view, $data);
    }
}