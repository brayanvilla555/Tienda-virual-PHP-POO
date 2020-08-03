<?php
/**
 * conexion a la base de datos 
 */
class Database
{
	public static function connect()
	{
		$bd = new mysqli('localhost','root','','tienda_master');
		$bd ->query("SET NAMES 'UTF-8'");
		return $bd;
	}
}

?>