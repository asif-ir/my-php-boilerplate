<?php

/**
 * Home
 */
class Home extends Controller
{
    public function index($data = [])
    {
        $data['name'] = User::where('id', '1')->first()->name ?? 'World';

        $this->view('index', $data);
    }
}
