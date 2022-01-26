<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../../config/conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function verificar($login,$password)
    {
		//$password=md5($password);
    	$sql="SELECT * FROM usuario WHERE login='$login' AND password='$password' AND estado='1'"; 
		$datoUsuario = ejecutarConsulta($sql);
		return $datoUsuario;
    }

	public function insertar($login,$password,$nombre,$apepaterno,$apematerno,$dni,$tipo,$celular,$permisos)
	{
		$creado_por = $_SESSION["id_usuario"];
		$sql="INSERT INTO usuario (login,password,nombres, apepaterno, apematerno, dni, tipo, celular, creado_por, estado) VALUES ('$dni','$password','$nombre','$apepaterno','$apematerno','$dni','$tipo','$celular','$creado_por','1')";
		$id_usuario = ejecutarConsulta_retornarID($sql);

		if($permisos){
			foreach($permisos as $id_permiso){
			$sql="INSERT INTO usuario_permiso(id_usuario,id_permiso) VALUES ('$id_usuario',$id_permiso)";
			$rspta = ejecutarConsulta($sql);
			}
		}
		else{
			$rspta = $id_usuario;
		}
		return $rspta;	
	}
	
}

?>