<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequisicoesController extends Controller
{
    public function PorStatus($status_id = null)
    {
        switch ($status_id) {
            case '1':
                $titulo = 'Cadastros Pendentes';
                break;
            case '2':
                $titulo = 'Cadastros em Andamento';
                break;
            case '3':
                $titulo = 'Cadastros Efetivados';
                break;
            default:
                $titulo = 'Todos Cadastros';
                break;
        }
        if ($status_id == null) {
            $requisicoes = \App\Requisicoes::get();
        } else {
            $requisicoes = \App\Requisicoes::where('status_id', $status_id)->get();
        }
        return view('cadastros.lista',compact('requisicoes','titulo'));
    }
}
