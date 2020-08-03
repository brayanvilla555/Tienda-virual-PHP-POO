<?php
require_once 'models/producto.php';

class productoController{

	public function index(){
		$producto = new producto();
		$productos = $producto -> getRandom(6);
		//var_dump($productos->fetch_object());
		//renderizar vista
		require_once 'views/producto/destacados.php';
	}

	public function ver(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$producto = new producto();
			$producto -> setId($id);

			$producto_ver = $producto -> getOne();

		}
		require_once 'views/producto/ver.php';
		
	}


	public function gestion(){
		Utils::isAdmin();
		$producto = new producto();
		$productos = $producto->getAll();

		//incluir una vista
		require_once 'views/producto/gestion.php';

	}

	public function crear(){
		Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}

	public function save(){
		if (isset($_POST)) {
			
			$nombre      = isset($_POST['nombre']) ? $_POST['nombre'] : flase;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio      = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock       = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria   = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			//$img         = isset($_POST['img']) ? $_POST['img'] : false;

			if ($nombre && $descripcion && $precio && $stock && $categoria) {
				$producto = new producto();
				$producto -> setNombre($nombre);
				$producto -> setDescripcion($descripcion);
				$producto -> setPrecio($precio);
				$producto -> setStock($stock);
				$producto -> setCategoria_id($categoria);

				//guardar la imagen

				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name']; 
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}
						$producto->setImg($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}

				//guardato todos los datos
				if(isset($_GET['id'])){ 
					$id =$_GET['id'];
					$producto->setId($id);
					$save = $producto -> edit();
				}else{
					$save = $producto -> save();
				}
//====================================================
				if ($save) {
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header("location:".base_url.'producto/gestion');
	}

	public function editar(){
		Utils::isAdmin();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$edit = true;

			$producto = new producto();
			$producto -> setId($id);

			$pro = $producto -> getOne();

			require_once 'views/producto/crear.php';
		}else{
			header("location:".base_url.'producto/gestion');
		}

	}

	public function eliminar(){
		Utils::isAdmin();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$producto = new producto();
			$producto->setId($id);
			$delete = $producto->delete();

			if ($delete) {
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
			header("location:".base_url.'producto/gestion');
		}


	}


}

?>
