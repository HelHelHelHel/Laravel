<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index() 
    {
        $title_of_page = 'Movie website';
        $view = view('index', [
            'title' => $title_of_page,
            'headline' => 'Welcome'
        ]);

        $view->with('date', date('j. n. Y'));
        $view->with([
            'username' => 'xyz',
            'admin' => false
        ]);
        
        return $view;

    }
}
