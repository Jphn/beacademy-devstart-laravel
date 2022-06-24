<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            'names' => [
                'José Lira',
                'João Lira'
            ]
        ];

        dd($users);
    }

    public function show($id)
    {
        dd($id);
    }
}
