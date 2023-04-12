@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-contant-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de equipamentos
                            <a href="{{ url('equipamento') }}" class="btn btn-success btn-sm float-end">
                            Listar equipamentos
                            </a>

                    </div>

                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        @if(Session::has('mensagem_erro'))
                            <div class="alert alert-danger">
                                {{ Session::get('mensagem_erro') }}
                            </div>
                        @endif
                        @if(Route::is('equipamento.show'))
                            {!! Form::model($equipamento,
                                            ['method'=>'PATCH',
                                            'url'=>'equipamento/'.$equipamento->id]) !!}
                        @else
                        {!! Form::open(['method'=>'POST', 'url'=>'equipamento']) !!}
                        @endif
                            {!! Form::label('nome', 'Nome') !!}
                            {!! Form::input('text', 'nome',
                            null, ['class'=>'form-control','placeholder'=>'nome', 'required', 'maxlenght'=>150, 'autofocus']) !!}
                            {{-- {!! Form::submit('salvar', ['class'=>'float-end btn btn-primary mt-3']) !!} --}}
                            {!! Form::label('data_aquisicao', 'Data Aquisição') !!}
                            {!! Form::input('date','data_aquisicao',
                            null,['class'=>'form-control','placeholder'=>'Endeço','required',]) !!}
                            {!! Form::label('tipo_id', "Tipo") !!}
                            {!! Form::select('tipo_id', $tipos,
                            null, ['class'=> 'form-control', 'placeholder'=>'Selecione o tipo', 'required']) !!}
                            {!! Form::submit('Salvar',['class' => 'float-end btn btn-primary mt-3']) !!}

                            {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>

</div>
@endsection


