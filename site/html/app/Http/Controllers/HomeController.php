<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        $requisicoes = \App\Requisicoes::where('status_id', '1')->orderBy('created_at','desc')->paginate(5);
        $conta = [
            "OK" => \App\Requisicoes::where('status_id','3')->count(),
            "CADASTRANDO" => \App\Requisicoes::where('status_id','2')->count(),
            "PENDENTES" => \App\Requisicoes::where('status_id','1')->count(),
            "TODOS" => \App\Requisicoes::count(),
        ];
        $active='active';
        $campus=\App\Campus::get();
        $tipo=\App\UsuarioTipo::get();
        return view('home',compact('requisicoes','titulo','conta','campus','tipo'));
    }
}
