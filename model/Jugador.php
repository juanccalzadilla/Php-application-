<?php
class Jugador
{

    protected $nombre;
    protected $apellidos;
    protected $posicion;
    protected $dorsal;
    protected $barcode;

    public function __construct($nombre, $apellidos, $posicion, $dorsal, $barcode)
    {

        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->posicion = $posicion;
        $this->dorsal = $dorsal;
        $this->barcode = $barcode;
    }

    public static function recuperarJugadores($bd)
    {
        $bd = $bd->getConexion();
        $sql = 'select * from jugadores';
        $stm = $bd->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        if ($result) {

            return $result;
        } else {
            return "Error";
        }
    }

    public static function recuperarPosiciones(){
      
        $poss = array ("1" => "Portero","2" =>"Defensa","3" =>"Lateral Izquiero","4" =>"Lateral Derecho", "5" =>"Central","6" =>"Delantero");
        return $poss;

    }

    public function crearJugador($bd)
    {
        if ($this->nombre && $this->apellidos && $this->posicion && $this->dorsal) {
            $bd = $bd->getConexion();
            $v = $bd->prepare('select dorsal from jugadores');
            $r = $v->execute();
            try {
                if (!in_array($r, $this->dorsal)) {
                    $sql = 'insert into jugadores (nombre,apellidos,dorsal,posicion,barcode) values (:nombre,:apellidos,:dorsal,:posicion,:barcode)';
                    $stm = $bd->prepare($sql);
                    $result = $stm->execute([":nombre" => $this->nombre, ":apellidos" => $this->apellidos, ":dorsal" => $this->dorsal, ":posicion" => $this->posicion, ":barcode" => $this->barcode]);

                    if ($result) {
                        return 'Creado';
                    } else {
                        return 'No creado';
                    }
                }
            } catch (PDOException $e) {
                return 'Error: El dorsal ya existe'; 
            }
        } else {
            return 'Faltan datos';
        }
    }
}
