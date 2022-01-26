<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function consultasfechas($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT * FROM usuario";
		$usuarios = ejecutarConsulta($sql);	
		return $usuarios;	
	}
	
	
}

?>