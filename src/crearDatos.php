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
$count = Jugador::recuperarJugadores($bd);
for ($i=0; $i < 5; $i++) { 
    if(isset($_REQUEST['submit'])){
        $nombre  = $faker->name();
        $apellidos = $faker->lastName();
        $posicion = mt_rand(1,6);
        $dorsal = mt_rand(1,40);
        $barcode = $faker->ean13();
        $jugador = new Jugador($nombre,$apellidos,$posicion,$dorsal,$barcode);
        $result = $jugador->crearJugador($bd);
        header('Location:index.php');
    }
}
if ($count > 0) {
    header('Location:index.php');
};

echo $blade->run('instalacion',array("resultado" => $result));




