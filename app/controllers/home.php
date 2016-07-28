<?php

/**
 * Home
 */
class Home extends Controller
{
    function index($data = [])
    {
        $data['name'] = 'World';

        $this->view('index', $data);
    }
}
