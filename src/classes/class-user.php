<?php

class User {
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $pais;

    public function __construct($nombre, $apellido, $fechaNacimiento, $pais) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->pais = $pais;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido() {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */
    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais() {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */
    public function setPais($pais) {
        $this->pais = $pais;

        return $this;
    }

    public function __toString() {
        return $this->nombre . " " . $this->apellido . " (" . $this->fechaNacimiento . "," . $this->pais . ")";
    }

    public function guardarUsuario() {
        $contenidoArchivo = file_get_contents("../data/usuarios.json");
        $usuarios = json_decode($contenidoArchivo, true);
        $usuarios[] = array(
            "nombre"          => $this->nombre,
            "apellido"        => $this->apellido,
            "fechaNacimiento" => $this->fechaNacimiento,
            "pais"            => $this->pais,
        );
        $archivo = fopen("../data/usuarios.json", "w");
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
    }

    public static function obtenerUsuarios() {
        $contenidoArchivo = file_get_contents("../data/usuarios.json");
        echo $contenidoArchivo;
    }

    public static function obtenerUsuario($indice) {
        $contenidoArchivo = file_get_contents("../data/usuarios.json");
        $usuarios = json_decode($contenidoArchivo, true);
        echo json_encode($usuarios[$indice]);
    }

    public function actualizarUsuario($indice) {
        $contenidoArchivo = file_get_contents("../data/usuarios.json");
        $usuarios = json_decode($contenidoArchivo, true);
        /* $usuario = $usuario[$indice]; */
        $usuario = array(
            'nombre'          => $this->nombre,
            'apellido'        => $this->apellido,
            'fechaNacimiento' => $this->fechaNacimiento,
            'pais'            => $this->pais,
        );
        $usuarios[$indice] = $usuario;
        $archivo = fopen('../data/usuarios.json', 'w');
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
    }

    public static function eliminarUsuario() {
        $contenidoArchivo = file_get_contents("../data/usuarios.json");
        $usuarios = json_decode($contenidoArchivo, true);
        array_splice($usuarios, $indice, 1);
        $archivo = fopen('../data/usuarios.json', 'w');
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);

    }
}

?>