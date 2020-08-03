<?php
class Categoria{
	private $id; 
	private $nombre;
	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

//===============================
	public function getId()
	{
	    return $this->id;
	}
	public function setId($id)
	{
	    $this->id = $id;
	}
//===================================
	function getNombre()
	{
	    return $this->nombre;
	}
	function setNombre($nombre)
	{
	    $this->nombre = $this->db->real_escape_string($nombre);
	}
//========================================
	public function getAll(){
		$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC ");
		return $categorias;
	}
//============================================
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id ={$this->getId()}");
		return $categoria->fetch_object();
	}

//===========================================0
	public function save(){
		$sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);

		$resul = false;
		if ($save) {
			$resul = true;
		}

		return false;
	}//nos quedameos en el set nombre por modificar  para poder guardar los datox
}

?>