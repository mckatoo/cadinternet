<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioTipo;
use Symfony\Component\VarDumper\Cloner\VarCloner;

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

    public function PorTipo($tipo = null)
    {
        switch ($tipo) {
            case '1':
                $titulo = 'Alunos';
                break;
            case '2':
                $titulo = 'Professores';
                break;
            case '3':
                $titulo = 'Funcionários';
                break;
            default:
                $titulo = 'Todos Cadastros';
                break;
        }
        if ($tipo == null) {
            $requisicoes = \App\Requisicoes::get();
        } else {
            $requisicoes = \App\Requisicoes::where('usuarioTipo_id', $tipo)->get();
        }

        $campus = \App\Campus::get();
        $utipo = \App\UsuarioTipo::get();
        return view('cadastros.tipo',compact('requisicoes','titulo','campus','utipo'));
    }

    public function Salvar(Request $request)
    {
        $tipo = Input::get('tipo');
        $req = new \App\Requisicoes;
        $req->nome = Input::get('nome');
        $req->rarefunc = Input::get('rarefunc');
        $req->ip = Input::get('IP');
        $req->MAC = Input::get('MAC');
        $req->campus_id = Input::get('campus');
        $req->usuarioTipo_id = $tipo;
        $req->save();
        PorTipo($tipo);
    }

}
