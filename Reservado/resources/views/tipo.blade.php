@extends('layouts.app')
@section('content')
<h1>Tipos</h1>
{{ $tipos }}
<h2> Listando os Tipos</h2>
{{-- @dd($tipos) --}}
@foreach ($tipos as $tipo)
    <p>{{ $tipo }}</p>
    <p> Titulos:  {{ $tipo->titulo }}</p>
    <p> Icone:  {{ $tipo->icone }}</p>
@endforeach
@endsection


