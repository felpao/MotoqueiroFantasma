@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-contant-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de tipos
                            <a href="{{ url('tipo/create') }}" class="btn btn-success btn-sm float-end">
                            Novo Local
                            </a>

                    </div>

                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                            @endif
                        <table class="table sn table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tipos as $tipo)
                                <tr>
                                    <td>{{ $tipo->id }}</td>
                                    <td>{{ $tipo->nome }}</td>
                                    <td>
                                        <a href="{{ url('tipo/'.$tipo->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Editar
                                        </a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url'=>'tipo/'.$tipo->id, 'style'=>'display:inline'
                                        ]) !!}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">
                                        Não há itens para listar!
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    <div class='pagination justify-contente-center'>
                        {{ $tipos->links() }}
                    </div>


                    </div>
                </div>
            </div>
        </div>

</div>
@endsection


