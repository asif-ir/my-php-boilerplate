<?php

/**
 * App
 */
class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // This'll check whether there is some content still left in the '$url'
        // array. If yes, then it will reshift the index of '$url[2]' to
        // $url[0], otherwise it'll simply return an empty array as
        // params.
        $this->params = $url ? array_values($url): [];

        // This'll call the method '$this->method' of '$this->controller' class
        // & pass '$this->params' as parameters.
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // We right trim the url for a '/' at the end because that would
            // add an extra element to the returned array.
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }
}
