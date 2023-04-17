<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Clientes;
use App\Models\Equipamento;
use App\Models\Local;
use App\Models\Reserva;
use App\Models\Equipamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Nette\Utils\Paginator as UtilsPaginator;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $reservas = Reserva::with('equipamento', 'local', 'cliente')->paginate(25);
        return view('reserva.lista', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::select('nome','id')->pluck('nome','id');
        $equipamentos = Equipamento::select('nome','id')->pluck('nome','id');
        $locais = Local::select('nome','id')->pluck('nome','id');

        return view('app.modules.reserva.formulario',compact('clientes','equipamentos','locais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Reserva $reserva)
    {
        $reserva = new Reserva();
        $reserva->fill($request->all());

        if($reserva->save()){
            return Redirect::route('reserva.index')->with('menssagem_sucesso','Reserva criado com sucesso');
        }else{
            return Redirect::route('reserva.index')->with('menssagem_erro','Ocorreu um erro ao criar o Reserva');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($reserva)
    {

        $reserva = Reserva::findOrFail($reserva);

        $clientes = Clientes::select('nome','id')->pluck('nome','id');
        $equipamentos = Equipamentos::select('nome','id')->pluck('nome','id');
        $locais = Local::select('nome','id')->pluck('nome','id');

        return view('app.modules.reserva.formulario',
        compact('reserva','clientes','equipamentos','locais'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($reserva)
    {
        $reserva = Reserva::findOrFail($reserva);

        $clientes = Clientes::select('nome','id')->pluck('nome','id');
        $equipamentos = Equipamentos::select('nome','id')->pluck('nome','id');
        $locais = Local::select('nome','id')->pluck('nome','id');

        return view('app.modules.reserva.formulario',
        compact('reserva','clientes','equipamentos','locais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->fill($request->all());

        if($reserva->save()){
            return Redirect::route('reserva.index')->with('menssagem_sucesso','Reserva alterado com sucesso');
        }else{
            return Redirect::route('reserva.index')->with('menssagem_erro','Ocorreu um erro ao alterar a Reserva');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($reserva)
    {

        $reserva = Reserva::findOrFail($reserva);

        $reserva->delete();

        if(!$reserva){

            return Redirect::to('reserva')->with('menssagem_erro','Erro ao remover a Reserva');
        }else{
            return Redirect::to('reserva')->with('menssagem_sucesso','Reserva removida com sucesso');
        }
    }

    public function devolucao($id){
        $date = Carbon::now();

        $reserva = Reserva::findOrFail($id);

        $reserva->devolucao = $date;
        $reserva->save();

        if($reserva){
            return Redirect::to('reserva')->with('menssagem_erro','Erro ao devolver a Reserva');
        }else{
            return Redirect::to('reserva')->with('menssagem_sucesso','Reserva devolvida com sucesso');
        }
    }
}
