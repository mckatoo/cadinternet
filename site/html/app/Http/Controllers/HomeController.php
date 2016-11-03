<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Cadastros Pendentes';
        $requisicoes = \App\Requisicoes::where('status_id', '1')->get();
        return view('home',compact('requisicoes','titulo'));
    }
}
