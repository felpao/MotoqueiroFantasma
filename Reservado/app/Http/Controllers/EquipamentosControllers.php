<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class EquipamentosControllers extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $equipamentos= Equipamento::with('tipo')->paginate(25);
        Paginator::useBootstrap();
        return view('equipamento.lista', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::select('titulo', 'id') ->pluck('titulo', 'id');
        return view('equipamento.formulario', compact('tipos'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $equipamento = new Equipamento();
        $equipamento->fill($request->all());
        if ($equipamento->save()) {
           $tipo = 'mensagem_sucesso';
           $msg = 'Equipamento salvo!';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/equipamento/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipamento $equipamento)
    {
        $equipamento = Equipamento::findOrFail($equipamento->id);
        $tipos = Tipo::select('titulo', 'id') ->pluck('titulo', 'id');
        return view('equipamento.formulario', compact('tipos', 'equipamento'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipamento $equipamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipamento $equipamento)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipamento $equipamento)
    {

        $equipamento = Equipamento::findOrFail($equipamento->id);
        if ($equipamento->delete()) {
           $tipo = 'mensagem_sucesso';
           $msg = 'Equipamento Excluido!';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/equipamento')->with($tipo, $msg);
    }
}
