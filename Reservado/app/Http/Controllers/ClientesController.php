<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ClientesController extends Controller
{

    public function index(){
        $clientes = Cliente::paginate(25);
        Paginator::useBootstrap();
        return view('cliente.lista', compact('clientes'));
    }


    public function create(){
        return view('cliente.formulario');

    }

    public function store(Request $request){
        $cliente = new Cliente();
        $cliente->fill($request->all());
        if ($cliente->save()){;
        $request->session()->flash('mensagem_sucesso',"Cliente salvo!");
        }else{
        $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('cliente/create');
    }

    public function update(Request $request, $cliente_id){
        $cliente = Cliente::findOrFail($cliente_id);
        $cliente->fill($request->all());
        if ($cliente->save()){;
        $request->session()->flash('mensagem_sucesso',"Cliente alterado!");
        }else{
        $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('cliente/'.$cliente->id);
    }

    public function show($id){
        $cliente = Cliente::findOrFail($id);
        return view('cliente.formulario', compact('cliente'));

    }

    public function destroy(Request $request, $cliente_id){
        $cliente = Cliente::findOrFail($cliente_id);
        $cliente->delete();
        $request->session()->flash('mensagem_sucesso',
            'Cliente removido com sucesso');
        return Redirect::to('cliente');

    }

}
