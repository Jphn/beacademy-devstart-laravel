<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViacepController extends Controller
{
    public function index(Request $req)
    {
        if ($req->cep)
            return redirect("/viacep/{$req->cep}");

        return view('viacep.index');
    }

    public function show($cep)
    {
        $result = Http::withoutVerifying()->get("https://viacep.com.br/ws/{$cep}/json/")->json();

        return $result;
    }
}
