{{-- Creamos una vista a partir del layout 
Vista principal Alumnos 
--}}


@extends('layout.layout');

@section('titulo', 'Home Alumnos');

@section('subtitulo', 'Panel Control Alumnos')

@section('contenido')
    {{-- Menu alumnos --}}
    @include('student.partials.menu')

    {{-- Lista de alumnos --}}
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>Apellidos</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alumnos as $alumno)
            <tr>
                <td scope="row">{{ $alumno->id }}</td>
                <td> {{ $alumno->lastname }}</td>
                <td> {{ $alumno->name }}</td>
                <td> {{ $alumno->phone }}</td>
                <td> {{ $alumno->city }}</td>
                <td> {{ $alumno->email }}</td>
                <td> {{ $alumno->course->course }}</td>

                {{-- Botones de accion --}}
                <td>
                    {{--Editar--}}
                    <a href='#' title='Editar'><i class="bi bi-pencil-square"></i></a>
                    {{--Mostrar--}}
                    <a href='#' title='Mostrar'><i class="bi bi-eye"></i></a>
                    {{--Eliminar--}}
                    <a href='#' title='Eliminar'><i class="bi bi-trash" onclick="return confirm('¿Desea eliminar el registro?')"></i></a>
                </td>
            </tr>
            @empty
                <p>No hay alumnos registrados</p>
            @endforelse
            </tbody>
    </table>
    <br><br><br> 
@endsection