<?php

require "../../Library/Database/database.php";
$vacuna = null;
$esModificacion = false;

// ---------------------------------------------------------------------------------------------------------------------------

function listar() {
    $resultado = ejecutarSql("SELECT * FROM vacunas");
    return $resultado;
    // $osiosi = mysqli_fetch_assoc($resultado);
    // echo $osiosi[0]['nombre'];
    // var_dump($osiosi);
    
}

// ---------------------------------------------------------------------------------------------------------------------------

function traerPorId($id) {
    $resultado = ejecutarSql("SELECT * FROM vacunas WHERE Id = {$id}");
    return $resultado->fetch_assoc();
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarRequest() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        // Obtener Query
        if(isset($_GET['Id'])) {
            global $vacuna;
            global $esModificacion;
            $idVacuna = $_GET['Id'];
            $esModificacion = true;
            $vacuna = traerPorId($idVacuna);
        } 
    }
    if($metodo == 'POST') {
        if(isset($_POST['Id']) && $_POST['Id'] != null){
            modificar();
        } else {
            crear();
        }
        header("Location: vistaListado.php");
        exit;
    }
}

// ---------------------------------------------------------------------------------------------------------------------------

function procesarBaja() {
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo == 'GET') {
        if(isset($_GET['Id'])) {
            $idVacuna = $_GET['Id'];
            eliminar($idVacuna);
        }
    }
}

// ---------------------------------------------------------------------------------------------------------------------------

function crear() {
    $nombreVacuna = $_POST['nombreVacuna'];
    $descripcionVacuna = $_POST['descripcionVacuna'];
    ejecutarSql("INSERT INTO vacunas (Nombre,Descripcion) VALUES ('{$nombreVacuna}','{$descripcionVacuna}')");
}

// ---------------------------------------------------------------------------------------------------------------------------

function modificar() {
    $idVacuna = $_POST['Id'];
    $vacuna = traerPorId($idVacuna);
    $vacuna['Nombre'] = $_POST['nombreVacuna'];
    $vacuna['Descripcion'] = $_POST['descripcionVacuna'];
    ejecutarSql("UPDATE vacunas SET Nombre = '{$vacuna['Nombre']}', Descripcion = '{$vacuna['Descripcion']}' WHERE Id = {$idVacuna}");
}

// ---------------------------------------------------------------------------------------------------------------------------

function eliminar($idVacuna){
    ejecutarSql("DELETE FROM vacunas WHERE Id = {$idVacuna}");
}

// ---------------------------------------------------------------------------------------------------------------------------
