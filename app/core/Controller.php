<?php

/**
 * Controller
 */
class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function view($view, $data = [])
    {
        require_once '../resources/views/' . $view . '.php';
    }
}
