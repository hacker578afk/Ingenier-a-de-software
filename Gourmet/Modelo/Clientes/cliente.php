<?php
// Modelo/Clientes/cliente.php
class Cliente {
    private $idClientes;
    private $nombres;
    private $apellidos;
    private $email;
    private $contrasena;
    private $idTipos;
    private $idMesas;

    public function getIdClientes() { return $this->idClientes; }
    public function setIdClientes($id) { $this->idClientes = $id; }

    public function getNombres() { return $this->nombres; }
    public function setNombres($nombres) { $this->nombres = $nombres; }

    public function getApellidos() { return $this->apellidos; }
    public function setApellidos($apellidos) { $this->apellidos = $apellidos; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getContrasena() { return $this->contrasena; }
    public function setContrasena($contrasena) { $this->contrasena = $contrasena; }

    public function getIdTipos() { return $this->idTipos; }
    public function setIdTipos($idTipos) { $this->idTipos = $idTipos; }

    public function getIdMesas() { return $this->idMesas; }
    public function setIdMesas($idMesas) { $this->idMesas = $idMesas; }
}