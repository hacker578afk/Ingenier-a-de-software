<?php
require_once('../Modelo/crudOperador.php');
require_once('../Modelo/Operador.php');

$crud = new crudOperador();
$operador = new Operador();
if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {
    $operador->setNombres($_POST['nombres']);
    $operador->setApellidos($_POST['apellidos']);
    $operador->setEmail($_POST['email']);
    $operador->setContrasena($_POST['contrasena']);
    $operador->setIdTiposOperador($_POST['idTiposOperador']);
    $operador->setIdMesas($_POST['idMesas']);
    $crud->insertar($operador);
    header('Location: ../Vista/CatalogoOperador.php');

} elseif (isset($_POST['actualizar'])) {
    $operador->setIdOperador($_POST['idOperador']);
    $operador->setNombres($_POST['nombres']);
    $operador->setApellidos($_POST['apellidos']);
    $operador->setEmail($_POST['email']);
    $operador->setContrasena($_POST['contrasena']);
    $operador->setIdTiposOperador($_POST['idTiposOperador']);
    $operador->setIdMesas($_POST['idMesas']);
    $crud->actualizar($operador);
    header('Location: ../Vista/CatalogoOperador.php');

} elseif (isset($_GET['eliminar'])) {
    $crud->eliminar($_GET['idOperador']);
    header('Location: ../Vista/CatalogoOperador.php');
}
?>
