<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(25);


        $clientes = Cliente::with('tipo')->paginate(25);
        Paginator::useBootstrap();
        return view('cliente/lista', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('app.modules.cliente.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->fill($request->all());

        if($cliente->save()){
            return Redirect::route('cliente.index')->with('menssagem_sucesso','Cliente criado com sucesso');
        }else{
            return Redirect::route('cliente.index')->with('menssagem_erro','Ocorreu um erro ao criar o Cliente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {

        $cliente = Cliente::findOrFail($cliente->id);

        return view('app.modules.cliente.formulario',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($cliente);

        return view('app.modules.cliente.formulario',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {

        $cliente = Cliente::findOrFail($cliente->id);
        $cliente->fill($request->all());

        if($cliente->save()){
            return Redirect::route('cliente.index')->with('menssagem_sucesso','Cliente alterado com sucesso');
        }else{
            return Redirect::route('cliente.index')->with('menssagem_erro','Ocorreu um erro ao alterar o Cliente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {

        $cliente->delete();

        return Redirect::to('cliente')->with('menssagem_sucesso','Cliente removido com sucesso');
    }
}
