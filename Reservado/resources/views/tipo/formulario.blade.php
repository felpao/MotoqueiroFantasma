@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-contant-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de locais
                            <a href="{{ url('local') }}" class="btn btn-success btn-sm float-end">
                            Listar locais
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
                        @if(Route::is('local.show'))
                            {!! Form::model(local,
                                            ['method'=>'PATCH']
                                            'url'=>'local/'.$local->id) !!}
                        @else
                        {!! Form::open(['method'=>'POST', 'url'=>'local']) !!}
                        @endif
                            {!! Form::open(['method'=>'POST', 'url'=>'local']) !!}
                            {!! Form::label('nome', 'Nome') !!}
                            {!! Form::input('text', 'nome', null, ['class'=>'form-control','placeholder'=>'nome', 'required', 'maxlenght'=>50, 'autofocus']) !!}
                            {{-- {!! Form::submit('salvar', ['class'=>'float-end btn btn-primary mt-3']) !!} --}}
                            {!! Form::label('endeco', 'Endeço') !!}
                            {!! Form::input('text','endeco', null,['class'=>'form-control','placeholder'=>'Endeço','required','maxlenght'=>150,'autofocus']) !!}
                            {!! Form::submit('Salvar',['class' => 'float-end btn btn-primary mt-3']) !!}
                            {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>

</div>
@endsection


