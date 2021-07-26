<?php
namespace Core;

class Page
{
    public function __construct(
        private $title = '',
        private $view = null, 
        private $data = []
    ) {}
    
    public function __get($property)
    {
        return $this->$property;
    }
}