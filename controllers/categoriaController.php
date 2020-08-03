<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';
class categoriaController{

	public function index(){
		Utils::isAdmin();
		//vinculamos el modelo
		$categoria = new categoria();
		$categorias = $categoria -> getAll();

		//vinculamos la vista
		require_once 'views/categoria/index.php';
	}

	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}

	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';

	}

	public function save(){
		Utils::isAdmin();

		if (isset($_POST) && isset($_POST['nombre'])) {
		//guardar datos en la db
			$categoria = new categoria();
			$categoria -> setNombre($_POST['nombre']);
			$categoria -> save();

			if ($save) {
				$_SESSION['reg_categorias'] = "complete";
			}else{
				$_SESSION['reg_categorias'] = "failed";
			}
		}

		header("location:".base_url."categoria/index");

	}
}

?>