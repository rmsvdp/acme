<?php

/**
 * @category class
 * Usuario :clase que modela un usuario de aplicación
 * 
 */

class Usuario{

    /** @var  String $nombre Nombre del usuario*/
    public $nombre;
    /** @var  String $pwd Contraseña del usuario*/
    public $pwd;
    /** @var  String $rol Nombre del usuario*/
    public $rol;

    /**
     * Constructor de la clase
     *
     * @param String $n valor para el nombre
     * @param String $p valor para la contraseña
     * @param String $r valor para el rol
     */
    public function __construct($n,$p,$r){

        $this->nombre = $n;
        $this->pwd = $p;
        $this->rol = $r;
    }
}
?>