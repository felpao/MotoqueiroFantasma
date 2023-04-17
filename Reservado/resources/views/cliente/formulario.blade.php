@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Cliente
                    <a href="{{ route('cliente.index') }}" class="btn btn-success btn-sm float-end">
                        Listar Clientes
                    </a>
                </div>
                <div class="card-body">
                    @if (Session::has('menssagem_sucesso'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('menssagem_sucesso') }}
                    </div>
                    @endif
                    @if (Session::has('menssagem_erro'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('menssagem_erro') }}
                    </div>
                    @endif
                    @if(Route::is('cliente.show'))
                    {!! Form::model($cliente,['method'=>'PATCH','url' =>
                    route('cliente.update',$cliente->id)]) !!}

                    @else
                    {!! Form::open(['method'=>'POST','url' => route('cliente.store')]) !!}

                    @endif
                    {!! Form::label('nome','Nome') !!}
                    {!! Form::input('text','nome',null,['class'=>'form-control
                    mb-3','placeholder'=>'Nome','required','maxlenght'=>50,'autofocus']) !!}
                    {!! Form::label('endereco','Endereço') !!}
                    {!!
                    Form::input('text','endereco',null,['class'=>'form-control','placeholder'=>'Endereco','required'])
                    !!}
                    {!! Form::label('fone','Telefone') !!}
                    {!!
                        Form::input('number','fone',null,['class'=>'form-control','placeholder'=>'Telefone','required'])
                    !!}
                    {!! Form::submit('Salvar',['class' => 'float-end btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
