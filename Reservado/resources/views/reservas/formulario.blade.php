@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados da Reserva
                    <a href="{{ route('reservas.index') }}" class="btn btn-success btn-sm float-end">
                        Listar Reservas
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
                    @if(Route::is('reservas.show'))
                    {!! Form::model($reserva,['method'=>'PATCH','url' =>
                    route('reservas.update',$reserva->id)]) !!}

                    @else
                    {!! Form::open(['method'=>'POST','url' => route('reservas.store')]) !!}

                    @endif

                    {!! Form::label('data','Data Aquisição') !!}
                    {!!
                    Form::input('date','data',null,['class'=>'form-control','placeholder'=>'Data','required'])
                    !!}

                    {!! Form::label('horario','Horario') !!}
                    {!!
                    Form::input('time','horario',null,['class'=>'form-control','placeholder'=>'Horario','required'])
                    !!}
                    {!! Form::label('equipamento_id','Equipamento') !!}
                    {!!
                    Form::select('equipamento_id',$equipamentos,null,['class' => 'form-control','placeholder'=>'Selecione um
                    Equipamento','required'])
                    !!}
                    {!! Form::label('local_id','Local') !!}
                    {!!
                    Form::select('local_id',$locais,null,['class' => 'form-control','placeholder'=>'Selecione um
                    Local','required'])
                    !!}
                    {!! Form::label('cliente_id','Cliente') !!}
                    {!!
                    Form::select('cliente_id',$clientes,null,['class' => 'form-control','placeholder'=>'Selecione um
                    Cliente','required'])
                    !!}
                    {!! Form::submit('Salvar',['class' => 'float-end btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
