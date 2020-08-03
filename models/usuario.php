<?php
class Usuario{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $imagen;
//conexion a la base de catos 
    private $db;

    public function __construct() {
		$this->db = Database::connect();
	}

//====================================00
     function getId()
	{
	    return $this->id ;
	}
     function setId($id)
	{
	    $this->id = $id;
	    return $this;
	}
//====================================
     function getNombre()
	{
	    return $this->nombre;
	}
     function setNombre($nombre)
	{
	    $this->nombre = $this->db->real_escape_string($nombre);

	}
//============================
	function getApellidos()
	{
	return $this->apellidos;
	}
	function setApellidos($apellidos)
	{
	$this->apellidos = $this->db->real_escape_string($apellidos);
	return $this;
	}
//==========================
	function getEmail()
	{
	return $this->email;
	}
	 function setEmail($email)
	{
	$this->email =$this->db->real_escape_string($email);
	}
//======================
	function getPassword()
	{
	return password_hash($this->db->real_escape_string($this->password),PASSWORD_BCRYPT,['cost' => 4]);
	}
	function setPassword($password)
	{
	$this->password = $password;
	return $this;
	}
//===============================
	function getRol()
	{
	return $this->rol;
	}
	function setRol($rol)
	{
	$this->rol = $rol;
	return $this;
	}
//================================
	function getImagen()
	{
	return $this->imagen;
	}
	function setImagen($imagen)
	{
	$this->imagen = $imagen;
	return $this;
	}
//=======================registro de usuarios
	public function save(){
		$sql = "INSERT INTO usuarios VALUES(null,'{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	} 
//=========================00login de usuarios
	public function login(){
		$result = false;

		$email = $this->email;
		$password = $this->password;

		//comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->db->query($sql);

		if ($login && $login->num_rows == 1) {
			$usuario = $login->fetch_object();

			//verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			if ($verify) {
				$result =  $usuario;

			}
		}
		return $result;
	}
}

?>