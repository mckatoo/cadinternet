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
                $titulo = 'Todos';
                break;
        }
        if ($tipo == null) {
            $requisicoes = \App\Requisicoes::get();
        } else {
            $requisicoes = \App\Requisicoes::where('usuarioTipo_id', $tipo)->get();
        }

        $campus = \App\Campus::get();
        // $utipo = \App\UsuarioTipo::get();
        return view('cadastros.tipo',compact('requisicoes','titulo','campus'));
    }

    public function Salvar(Request $request)
    {
        try {
            $req = new \App\Requisicoes;
            $req->nome = $request->input('nome');
            $req->rarefunc = $request->input('rarefunc');
            $req->ip = $request->input('IP');
            $req->MAC = $request->input('MAC');
            $req->campus_id = $request->input('campus');
            switch ($request->input('tipo')) {
                case 'Professores':
                $tp = 2;
                break;
                case 'Funcionários':
                $tp = 3;
                break;
                default:
                $tp = 1;
                break;
            }
            $req->usuarioTipo_id = $tp;
            $req->save();
            switch ($tp) {
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
                $titulo = 'Todos';
                break;
            }
            if ($tp == null) {
                $requisicoes = \App\Requisicoes::get();
            } else {
                $requisicoes = \App\Requisicoes::where('usuarioTipo_id', $tp)->get();
            }
            $mensagem = 'Cadastrado com sucesso!!!';
            $campus = \App\Campus::get();
            return view('cadastros.tipo',compact('requisicoes','titulo','campus','mensagem'));
        } catch (\Exception $e) {
            return $e;
        }

    }

}
