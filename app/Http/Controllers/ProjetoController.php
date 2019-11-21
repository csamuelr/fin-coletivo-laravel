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
        // $data = array(
        //     'titulo' => $projetos->titulo,
        //     'custo' => $projetos->custo,
        //     'status' => $projetos->status,
        // )

        return view('home', compact('projetos', $projetos));
    }

    public function projetos()
    {
        $idUser = auth()->user()->id;
        $projetos = ProjetoModel::all();
        //return view('projetos', compact('projetos', $projetos));
        return view('projetos')->with('projetos', $projetos)->with('usuario', $idUser);
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
            'imagem1' => $repo->saveImage(request('imagem1'), auth()->user()->id),
            'imagem2' => $repo->saveImage(request('imagem2'), auth()->user()->id),
        ];
        ProjetoModel::create($data);
        return redirect('home');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ProjetoModel  $projetoModel
     * @return \Illuminate\Http\Response
     */

    // ProjetoModel $projetoModel
    public function show($id)
    {
        $projeto = ProjetoModel::find($id);
        return view('projetos', compact('projeto', $projeto));
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
        $proj = ProjetoModel::find($request->id);

        // Make sure you've got the Page model
        if ($proj) {
            $proj->status = false;
            $proj->save();
        }
        //$projetoModel->save();
        return redirect('projetos');
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
