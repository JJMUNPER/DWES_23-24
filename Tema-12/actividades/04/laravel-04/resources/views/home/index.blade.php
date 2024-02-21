<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home controller vista</title>
</head>
<body>

    <p>Hola Blade Laravel</p>

    <caption>Listado Clientes</caption>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente['id']}}</td>
                <td>{{$cliente['nombre']}}</td>
            </tr>
            @endforeach
        </tbody>
        
        <tfoot>Nº</tfoot>
    </table>


    @forelse ($usuarios as $usuario)
        {{print_r($usuario)}}  
    @empty
        <p>Sin usuarios</p>  
    @endforelse


    @if ($nivel == 1)
        <p>Estoy en primer curso</p>
    @else
        <p>Estoy en segundo curso</p>
    @endif

    
    <footer>
        <p>Autor: {{$autor}}</p>
        <p>Curso: {{$curso}}</p>
        <p>Módulo: {{$modulo ?? 'Base de Datos'}}</p>
        <p>Nivel: {{$nivel}}</p>
    </footer>

    <!-- Esto es un comentario HTML -->
    {{--Esto es un comentario en Blade--}}
    
</body>
</html>