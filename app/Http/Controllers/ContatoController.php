<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        // var_dump($_GET); // Testando o Form - GET
        // var_dump($_POST); // Testando o Form - POST

        return view('site.contato', ['titulo' => 'Contato']);
    }
}
