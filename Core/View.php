<?php

class View
{
    private array $_content;
    private string $_title;

    public function __construct(?array $content){
        if (isset($content)) $this->_content = $content;
    }

    public function setTitle(string $title): void
    {
        $this->_title = $title;
    }

    public function display(string $view) : void{
        if (isset($this->_title)) $title = $this->_title; //References layout.php
        if (isset($this->_content)) $content = $this->_content;
        ob_start();
        include Constants::getPath('views') . $view;
        ob_end_flush();
    }

    public static function displayWithoutParams(string $view) : void{
        ob_start();
        include Constants::getPath('views') . $view;
        ob_end_flush();
    }
}