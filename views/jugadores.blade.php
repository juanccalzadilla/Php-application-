@extends('app')
@section('title','Lista de jugadores')
@section('cabecera','Jugadores')
@section('contenido')
@if(isset($_REQUEST['created']))
<!-- <div class="alert alert-success">Jugador Creado</div> -->
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Jugador Creado',
  showConfirmButton: false,
  timer: 1500
})
</script>
@elseif(isset($_REQUEST['init']))
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Datos creados',
  text:'Los datos de pruebas se han creado correctamente, disfruta la app',
  showConfirmButton: false,
  timer: 2500
})
</script>
@endif
<a href="../src/crearJugador.php" class="btn btn-success w-100 m-2">Crear nuevo jugador</a>
<table class="table table-primary">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Dorsal</th>
            <th scope="col">Posicion</th>
            <th scope="col">Barcode</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jugadores as $jugador)
        <tr>
            <th scope="row">{{$jugador['id']}}</th>
            <td>{{$jugador['nombre']}}</td>
            <td>{{$jugador['apellidos']}}</td>
            @if($jugador['dorsal'] == null)
            <td>Sin asignar</td>
            @else
            <td>{{$jugador['dorsal']}}</td>
            @endif
            <td>{{$jugador['posicion']}}</td>
            <td>
                @php 
                echo $barcode->getBarcodeHTML($jugador['barcode'], 'EAN13');
                @endphp
            </td>
        </tr>
        @endforeach
        </tr>
    </tbody>
</table>

@endsection