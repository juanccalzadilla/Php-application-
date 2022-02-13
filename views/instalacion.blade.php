@extends('app')
@section('title','Instalacion')
@section('cabecera','Crear Datos')
@section('contenido')

<div class="alert alert-danger">{{$resultado}}</div>
<form action="../src/crearDatos.php">
    <button class="btn btn-primary w-100" name="submit"">Crear Datos</button>
</form>

@endsection