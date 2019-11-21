<?php

namespace App\Http\Controllers;

use App\ProjetoModel;
use Illuminate\Http\Request;
use Session;
use App\Repositorio\ImagemRepositorio;
use Auth;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = ProjetoModel::all();
        return view('projetos'); //, compact('id', 'titulo', 'custo', 'tempoDev'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImagemRepositorio $repo)
    {
        $data = [
            'idUsuario' => auth()->user()->id,
            'titulo' => request('titulo'),
            'descricao' => request('descricao'),
            'custo' => request('custo'),            
            'tempDev' => request('tempoDev'),
            'imagem1' => $repo->saveImage(request('imagem1'),auth()->user()->id),
            'imagem2' => $repo->saveImage(request('imagem2'),auth()->user()->id),
        ];
        ProjetoModel::create($data);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjetoModel  $projetoModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProjetoModel $projetoModel)
    {
        return view('projeto', compact('projetoModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjetoModel  $projetoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjetoModel $projetoModel)
    {
        $projeto = ProjetoModel::all();
        return view('projeto');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjetoModel  $projetoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjetoModel $projetoModel)
    {
        $projetoModel->id = auth()->user()->id;
        $projetoModel->titulo = $request->titulo;
        $projetoModel->descricao = $request->descricao;
        $projetoModel->custo = $request->custo;
        $projetoModel->save();
        return redirect('projeto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjetoModel  $projetoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjetoModel $projetoModel)
    {
        $projetoModel->delete();
        return redirect('projetos');
    }
}
