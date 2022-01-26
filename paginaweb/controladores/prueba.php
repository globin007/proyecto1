<?php
session_start();
require_once "../modelos/reserva.php";

$bicicleta = new Reserva();

$id_bicicleta=isset($_POST["id_bicicleta"])? limpiarCadena($_POST["id_bicicleta"]):"";
$id_usuario=isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";
$modelo=isset($_POST["modelo"])? limpiarCadena($_POST["modelo"]):"";
$marca=isset($_POST["marca"])? limpiarCadena($_POST["marca"]):"";
$color=isset($_POST["color"])? limpiarCadena($_POST["color"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
$id_estado=isset($_POST["id_estado"])? limpiarCadena($_POST["id_estado"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";


$id_reserva=isset($_POST["id_reserva"])? limpiarCadena($_POST["id_reserva"]):"";
$hora_inicio=isset($_POST["hora_inicio"])? limpiarCadena($_POST["hora_inicio"]):"";
$hora_fin=isset($_POST["hora_fin"])? limpiarCadena($_POST["hora_fin"]):"";
$cantidad_horas=isset($_POST["cantidad_horas"])? limpiarCadena($_POST["cantidad_horas"]):"";

switch($_GET["op"]){

    case 'listar':
        $rspta=$bicicleta->listar();
        echo json_encode($rspta);
    break;
}