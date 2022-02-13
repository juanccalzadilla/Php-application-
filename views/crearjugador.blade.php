@extends('app')
@section('title','Nuevo Jugador')
@section('cabecera','Crear Jugador')
@section('contenido')

<div class="alert alert-warning">{{$result}}</div>
<form method="post" action="../src/crearJugador.php">
  <div class="d-flex">
    <div class="m-3 w-50">
      <label for="nombre" class="form-label text-white">Nombre</label>
      <input type="text" class="form-control" name="nombre" placeholder="Nombre">
    </div>
    <div class="m-3 w-50">
      <label for="apellidos" class="form-label text-white">Apellidos</label>
      <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
    </div>
  </div>
  <div class="d-flex">

    <div class="m-3 w-50">
      <label for="dorsal" class="form-label text-white">Dorsal</label>
      <input type="number" class="form-control" name="dorsal" placeholder="Dorsal">
    </div>
    <div class="m-3 w-50">
      <label for="posicion" class="form-label text-white">Posicion</label>
      <select class="form-select" name="posicion" aria-label="Default select example">
        @foreach($posicion as $key => $poss)
        <option value={{$key}}>{{$poss}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="m-3 w-100">
    <label for="barcode" class="form-label text-white">Codigo de barras</label>
    <input type="text" readonly class="form-control" name="barcode" placeholder="Codigo de barras" value={{$barcode}}>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Crear</button>
  <button type="reset" class="btn btn-success">Reset</button>
  <a href="../src/index.php" class="btn btn-outline-danger">Volver</a>
  <!-- <button type="button" class="btn btn-secondary">Generar codigo de barras</button> -->
</form>

@endsection