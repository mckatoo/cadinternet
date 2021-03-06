<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioTipo;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use App\Http\Requests\RequisicoesRequest;
use App\Http\Requests\RequisicoesAtualizarRequest;

class RequisicoesController extends Controller
{
    public function Pesquisa(Request $request)
    {
        $palavra = $request->input('pesquisar');
        $conta = [
            "OK" => \App\Requisicoes::where('status_id','3')->count(),
            "CADASTRANDO" => \App\Requisicoes::where('status_id','2')->count(),
            "PENDENTES" => \App\Requisicoes::where('status_id','1')->count(),
            "TODOS" => \App\Requisicoes::count(),
        ];
        if ($palavra) {
            $requisicoes = \App\Requisicoes::with('campus','status','tipo')
            ->where('nome','like','%'.$palavra.'%')
            ->orWhere('rarefunc','like','%'.$palavra.'%')
            ->orderBy('created_at','desc')
            ->paginate(10);
        } else {
            $requisicoes = \App\Requisicoes::with('campus','status','tipo')->orderBy('created_at','desc')->paginate(10);
        }
        $campus=\App\Campus::get();
        $tipo=\App\UsuarioTipo::get();
        $titulo = "Resultados para: ".$palavra;

        return view('home',compact('requisicoes','titulo','conta','campus','tipo'));
    }

    public function PorStatus($status_id = null)
    {
        $conta = [
            "OK" => \App\Requisicoes::where('status_id','3')->count(),
            "CADASTRANDO" => \App\Requisicoes::where('status_id','2')->count(),
            "PENDENTES" => \App\Requisicoes::where('status_id','1')->count(),
            "TODOS" => \App\Requisicoes::count(),
        ];
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
            $requisicoes = \App\Requisicoes::orderBy('created_at','desc')->paginate(10);
            // $requisicoes = \App\Requisicoes::orderBy('created_at')->get();
        } else {
            $requisicoes = \App\Requisicoes::where('status_id', $status_id)->orderBy('created_at','desc')->paginate(10);
            // $requisicoes = \App\Requisicoes::where('status_id', $status_id)->orderBy('created_at')->get();
        }
        $active='active';
        $campus = \App\Campus::get();
        $tipo=\App\UsuarioTipo::get();

        return view('home',compact('requisicoes','titulo','conta','campus','tipo'));
    }

    public function PorTipo($tipo = null)
    {
        $conta = [
            "OK" => \App\Requisicoes::where('status_id','3')->count(),
            "CADASTRANDO" => \App\Requisicoes::where('status_id','2')->count(),
            "PENDENTES" => \App\Requisicoes::where('status_id','1')->count(),
            "TODOS" => \App\Requisicoes::count(),
        ];
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
            $requisicoes = \App\Requisicoes::orderBy('created_at','desc')->paginate(10);
        } else {
            $requisicoes = \App\Requisicoes::where('usuarioTipo_id', $tipo)->orderBy('created_at','desc')->paginate(10);
        }

        $campus = \App\Campus::get();
        $tipo=\App\UsuarioTipo::get();

        return view('home',compact('requisicoes','titulo','campus','conta','tipo'));
    }

    public function Salvar(RequisicoesRequest $request)
    {
        $req = new \App\Requisicoes;
        $req->nome = strtoupper($request->input('nome'));
        $req->rarefunc = strtoupper($request->input('rarefunc'));
        $req->MAC = strtoupper($request->input('MAC'));
        $req->campus_id = $request->input('campus');
        $req->usuarioTipo_id = $request->input('tipo');
        $req->save();

        return back()->with('mensagem','Requisição cadastrada com sucesso!');
    }

    public function Atualiza(RequisicoesAtualizarRequest $request)
    {
        $req = \App\Requisicoes::find($request->id);
        $req->nome = strtoupper($request->nome);
        $req->rarefunc = strtoupper($request->rarefunc);
        $req->IP = $request->IP;
        $req->MAC = strtoupper($request->MAC);
        $req->usuarioTipo_id = $request->tipo;
        $req->campus_id = $request->campus;
        $req->status_id = 3;
        $req->save();

        return back()->with('mensagem','Requisição atualizada com sucesso!');
    }

    public function Apagar(Request $request)
    {
        \App\Requisicoes::find($request->id)->delete();

        $urlAnterior=explode('/', back()->getTargetUrl());
        if ($urlAnterior[4]="pesquisa") {
            return redirect("/")->with('mensagem','Registro apagado com sucesso!');
        }else{
            return back()->with('mensagem','Registro apagado com sucesso!');
        }
    }

    public function Cadastrando(Request $request)
    {
        $req = \App\Requisicoes::find($request->id);
        if ($req->status_id < 3) {
            $req->status_id = $request->input('status');
            $req->save();
        }
    }

}