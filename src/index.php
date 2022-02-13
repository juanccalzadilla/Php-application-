<?php
require '../model/Jugador.php';
require '../model/BD.php';
require '../vendor/autoload.php';
use eftec\bladeone\BladeOne;
use Milon\Barcode\DNS1D;
$views = '../views';
$cache = '../cache';
$blade = new BladeOne($views, $cache);
$bd = new BD();
$result = Jugador::recuperarJugadores($bd);



$d = new DNS1D();
$d->setStorPath(__DIR__.'/cache/');


echo $blade->run('jugadores',array('jugadores' => $result,'barcode'=>$d,'message'=>$resultado));