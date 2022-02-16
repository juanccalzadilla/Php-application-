<?php
require '../model/Jugador.php';
require '../model/BD.php';
require '../vendor/autoload.php';
use eftec\bladeone\BladeOne;
$views = '../views';
$cache = '../cache';
$blade = new BladeOne($views, $cache);

$faker = Faker\Factory::create();
$bd = new BD();
$barcode = $faker->ean13();
$poss = Jugador::recuperarPosiciones();
$resultado = null;
 if (isset($_REQUEST['submit'])) {
    if (!empty($_REQUEST['nombre']) && !empty($_REQUEST['apellidos']) && !empty($_REQUEST['posicion'])) {
        $nombre  = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $posicion = $_REQUEST['posicion'];
        $dorsal = $_REQUEST['dorsal'];
        $b = $_REQUEST['barcode'];
        $j = new Jugador($nombre,$apellidos,$posicion,$dorsal,$b);
        $resultado = $j->crearJugador($bd);
        if ($resultado) {
            header('Location:index.php?created=true');
        }else
        {
            $resultado = 'El dorsal '. $dorsal . ' ya existe' ;
        }
    }else{
        $resultado = "Todos los campos deben estar rellenos";
    }
};
echo $blade->run('crearjugador',['barcode' => $barcode,'result' => $resultado,'posicion' => $poss]);



