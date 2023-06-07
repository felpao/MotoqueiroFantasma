<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Tipos</title>
</head>
<body>
    <h1>Relatório de tipos</h1>
    <hr>
    <table border="1" cellpadding ='0' cellspacing="0"
        style="width: 100%;  text-align: center" >
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Icone</th>
        </tr>
        @forelse ($tipos as $tipo)
        <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->titulo }}</td>
            <td>{{ $tipo->icone }}</td>
            <td><img src="{{ $logo }}" alt="">
            <img src="{{ public_path('/uploads/tipos/wp8357470.jpg') }}" alt="">
        </td>
        </tr>

        @empty
        <tr>
            <td colspan="3">Nenhum tipo cadastrado</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
