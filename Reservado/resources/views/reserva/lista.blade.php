@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista das Reservas
                    <a href="{{ route('reservas.create') }}" class="btn btn-success btn-sm float-end">
                        Nova Reserva
                    </a>
                </div>
                <div class="card-body">
                    @if (Session::has('menssagem_sucesso'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('menssagem_sucesso') }}
                    </div>
                    @endif
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Data</th>
                                <th>Horario</th>
                                <th>Ações</th>
                                <th>Equipamento</th>
                                <th>Local</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservas as $reserva)
                            <tr>
                                <td> {{ $reserva->id }}</td>
                                <td>{{ $reserva->data }}</td>
                                <td>{{ $reserva->horario }}</td>
                                <td>{{ $reserva->equipamento->nome }}</td>
                                <td>{{ $reserva->local->nome }}</td>
                                <td>{{ $reserva->cliente->nome }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('reservas.show', $reserva->id) }}"
                                        class="btn btn-primary btn-sm mx-1">
                                        Editar
                                    </a>

                                    {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => route('reservas.destroy', $reserva->id),
                                    'style' => 'display:inline',
                                    ]) !!}
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">
                                        Excluir
                                    </button>
                                    {!! Form::close() !!}
                                    <a href="{{ route('reservas.devolucao', $reserva->id) }}"
                                        class="btn btn-info btn-sm mx-1">
                                        Devolver
                                    </a>
                                </td>
                            </tr>

                            @empty

                            <tr>
                                <td colspan="3">Nâo há itens para listar</td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $reservas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
