<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Controler simples para demonstração
class HelloController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }
}
