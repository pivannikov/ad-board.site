<?php
namespace Core;

class Route
{
    public function __construct(
        private $path, 
        private $controller, 
        private $action
    ) {}
    
    public function __get($property)
    {
        return $this->$property;
    }
}