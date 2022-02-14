@extends('app')
@section('title','Lista de jugadores')
@section('cabecera','Jugadores')
@section('contenido')
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
           
            <!-- <td>
                   <div style="font-size:0;position:relative;width:190px;height:30px;">
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:0px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:4px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:8px;top:0px;"> </div>
                       <div style="background-color:black;width:4px;height:30px;position:absolute;left:16px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:24px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:28px;top:0px;"> </div>
                       <div style="background-color:black;width:4px;height:30px;position:absolute;left:36px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:42px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:52px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:60px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:66px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:70px;top:0px;"> </div>
                       <div style="background-color:black;width:4px;height:30px;position:absolute;left:78px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:84px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:92px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:96px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:100px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:110px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:114px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:124px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:128px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:136px;top:0px;"> </div>
                       <div style="background-color:black;width:4px;height:30px;position:absolute;left:142px;top:0px;"> </div>
                       <div style="background-color:black;width:4px;height:30px;position:absolute;left:148px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:156px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:164px;top:0px;"> </div>
                       <div style="background-color:black;width:6px;height:30px;position:absolute;left:170px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:180px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:184px;top:0px;"> </div>
                       <div style="background-color:black;width:2px;height:30px;position:absolute;left:188px;top:0px;"> </div>
                   </div>
               </td> -->
           

           


        </tr>
        @endforeach
        </tr>
    </tbody>
</table>

@endsection