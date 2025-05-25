<?php
class Operador {
    private $idOperador;
    private $nombres;
    private $apellidos;
    private $email;
    private $contrasena;
    private $idTiposOperador;
    private $idMesas;

    public function getIdOperador() {
        return $this->idOperador;
    }

    public function setIdOperador($idOperador) {
        $this->idOperador = $idOperador;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function getIdTiposOperador() {
        return $this->idTiposOperador;
    }

    public function setIdTiposOperador($idTiposOperador) {
        $this->idTiposOperador = $idTiposOperador;
    }

    public function getIdMesas() {
        return $this->idMesas;
    }

    public function setIdMesas($idMensas) {
        $this->idMesas = $idMensas;
    }
}
?>
