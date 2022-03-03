<?php
class Jugador
{
    // Creacion de la variables del tipo protected, se pueden heredar por clases hijas
    protected $nombre;
    protected $apellidos;
    protected $posicion;
    protected $dorsal;
    protected $barcode;

    // Creacion del contructor para establecer los atributos
    public function __construct($nombre, $apellidos, $posicion, $dorsal, $barcode)
    {

        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->posicion = $posicion;
        $this->dorsal = $dorsal;
        $this->barcode = $barcode;
    }

    // Metodo para recuperar todos los jugadores de la base de datos
    public static function recuperarJugadores($bd)
    {
        $bd = $bd->getConexion();
        $sql = 'select * from jugadores';
        $stm = $bd->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        // Si el resultado es verdadero devuelve los jugadores, sino devuelve false
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    // Recuperacion de las posiciones para mostrarlo en el select, no se si es adecuado asi pero fue la mejor manera que se me ocurrio.
    public static function recuperarPosiciones()
    {
        $poss = array("1" => "Portero", "2" => "Defensa", "3" => "Lateral Izquiero", "4" => "Lateral Derecho", "5" => "Central", "6" => "Delantero");
        return $poss;
    }

    // El metodo mas importante, la creacion de los jugadores. 
    public function crearJugador($bd)
    {
        // este if comprueba que todos los datos esten cumplimentados sino el metodo devuelve que faltan datos 
        if ($this->nombre && $this->apellidos && $this->posicion) {
            // Se hace la conexion a la BD
            $bd = $bd->getConexion();
            // Recupero todo los dorsales para la comprobacion de la linea 63
            $v = $bd->prepare('select dorsal from jugadores');
            $v->execute();
            try {
                // Este if se ejecuta siempre que el dorsal no este vacio, sino se ejecuta else que contiene la consulta pero enviando 
                // la variable dorsal como null 
                if ($this->dorsal != 0) {
                    // Si todo esta bien se envia la consulta e insertan los datos 
                    $sql = 'insert into jugadores (nombre,apellidos,dorsal,posicion,barcode) values (:nombre,:apellidos,:dorsal,:posicion,:barcode)';
                    $stm = $bd->prepare($sql);
                    $result = $stm->execute([":nombre" => $this->nombre, ":apellidos" => $this->apellidos, ":dorsal" => $this->dorsal, ":posicion" => $this->posicion, ":barcode" => $this->barcode]);
                    // Si se tiene un resultado y la consulta se ejecuto correctamente envia 'creado' sino 'no creado'
                    if ($result) {
                        return 'Creado';
                    } else {
                        return 'No creado';
                    }
                } else {
                    $sql = 'insert into jugadores (nombre,apellidos,dorsal,posicion,barcode) values (:nombre,:apellidos,:dorsal,:posicion,:barcode)';
                    $stm = $bd->prepare($sql);
                    $result = $stm->execute([":nombre" => $this->nombre, ":apellidos" => $this->apellidos, ":dorsal" => null, ":posicion" => $this->posicion, ":barcode" => $this->barcode]);
                    if ($result) {
                        return 'Creado';
                    } else {
                        return 'No creado';
                    }
                }
            } catch (PDOException $e) {
                // Si el dorsal ya existe es capturado por el catch 
                return false;
            }
        } else {
            return 'Faltan datos';
        }
    }
}
