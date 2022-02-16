@extends('app')
@section('title','Instalacion')
@section('cabecera','Crear Datos')
@section('contenido')

@if($resultado)
<div class="alert alert-warning">{{$resultado}}</div>
@endif
<form action="../src/crearDatos.php">
    <button class="btn btn-primary w-100" name="submit"">Crear Datos</button>
</form>
<div class="d-flex justify-content-center">
    <img src="../install.svg" alt="Install" class="m-4" width="600">
</div>
@endsection