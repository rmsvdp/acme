<?php
class Usuario{

    public $nombre;
    public $pwd;
    public $rol;

    public function __construct($n,$p,$r){

        $this->nombre = $n;
        $this->pwd = $p;
        $this->rol = $r;
    }
}
?>