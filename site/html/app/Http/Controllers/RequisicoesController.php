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
        $campus = \App\Campus::get();
        try {
            $req = new \App\Requisicoes;
            $req->nome = strtoupper($request->input('nome'));
            $req->rarefunc = strtoupper($request->input('rarefunc'));
            $req->MAC = strtoupper($request->input('MAC'));
            $req->campus_id = $request->input('campus');
            $titulo = $request->input('tipo');
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
            if ($tp == null) {
                $requisicoes = \App\Requisicoes::get();
            } else {
                $requisicoes = \App\Requisicoes::where('usuarioTipo_id', $tp)->get();
            }
            $mensagem = 'Cadastrado com sucesso!!!';
            return view('cadastros.tipo',compact('requisicoes','titulo','campus','mensagem'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function Apagar(Request $request)
    {
        $id = $request->input('id');
        $titulo = $request->input('titulo');
        $campus = \App\Campus::get();
        try {
            $req = \App\Requisicoes::find($id);
            $nome = $req->nome;
            $tipo = $req->usuarioTipo_id;
            $status_id = $req->status_id;
            $req->delete();
            $mensagem = "$nome excluido com sucesso!!!";
            $conta = [
                "OK" => \App\Requisicoes::where('status_id','3')->count(),
                "CADASTRANDO" => \App\Requisicoes::where('status_id','2')->count(),
                "PENDENTES" => \App\Requisicoes::where('status_id','1')->count(),
                "TODOS" => \App\Requisicoes::count(),
            ];
            if (($titulo == "Cadastros Pendentes")||($titulo == "Cadastros Efetivados")||($titulo == "Cadastros em Andamento")||($titulo == "Todos Cadastros")) {
                $requisicoes = \App\Requisicoes::where('status_id', $status_id)->get();
                return view('cadastros.lista',compact('requisicoes','titulo','conta','mensagem'));
            } else {
                $requisicoes = \App\Requisicoes::where('usuarioTipo_id', $tipo)->get();
                return view('cadastros.tipo',compact('requisicoes','titulo','campus','mensagem'));
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}
