<?php
class Controller {
    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }

    public function loadTemplateInView($templateName, $viewData = array()){
        extract($viewData);
        require './views/Templates/'.$templateName.'.php';

    }
}