<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $user = 'José Maik Freitas';
        return Inertia::render('Home', [
            'user' => $user
        ]);
    }

    public function inserir()
    {
        return Inertia::render('Inserir');
    }
}
