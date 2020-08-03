<?php
require_once 'models/pedido.php';	

class pedidoController{

	public function hacer(){
		
		require_once 'views/pedido/hacer.php';
	}

	public function add(){
		if (isset($_SESSION['identityt'])) {
			//guardar datos
			$usuario_id = $_SESSION['identityt'] -> id;
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

			$stats = Utils::statsCarrito();
			$coste = $stats['total'];

			if (isset($_POST['provincia']) && isset($_POST['localidad']) && isset($_POST['direccion'])) {
				$pedido = new  Pedido();
				$pedido -> setUsuario_id($usuario_id);
				$pedido -> setProvincia($provincia);
				$pedido -> setLocalidad($localidad);
				$pedido -> setDireccion($direccion);
				$pedido -> setCoste($coste);

				$save = $pedido->save();

				//guardar linea pedido
				$save_linea = $pedido->save_linea();


				if ($save && $save_linea) {
					$_SESSION['pedido'] = "complete";
				}else{
					$_SESSION['pedido'] = "failed";
				}

			}else{
				$_SESSION['pedido'] = "failed";
			}
			header("location:".base_url.'pedido/confirmado');

		}else{
			//redirigir al index
			header("location:".base_url);
		}

	}
	public function confirmado(){
		if (isset($_SESSION['identityt'])) {
			$identity = $_SESSION['identityt'];
			$pedido = new Pedido();
			$pedido -> setUsuario_id($identity->id);

			$pedido = $pedido -> getOneByUser();	

			$pedido_productos = new Pedido();
			$productos = $pedido_productos -> getProductosByPedido($pedido->id);
		}
		require_once 'views/pedido/confirmado.php';

	}
	Public function mis_pedidos(){
		Utils::isUser();
		$usuario_id = $_SESSION['identityt']->id;
		$pedido = new Pedido();

		//sacar los pedidos del usuario
		$pedido -> setUsuario_id($usuario_id);
		$pedidos = $pedido -> getAllByUser();

		require_once 'views/pedido/mis_pedidos.php';
	}
	public function detalle(){
		Utils::isUser();

		if (isset($_GET['id'])) {
			$id = $_GET['id'];

             //sacar los datos del pedido
			$pedido = new Pedido();
			$pedido -> setId($id);
			$pedido = $pedido -> getOne();	

			//sacar los pedidos
			$pedido_productos = new Pedido();
			$productos = $pedido_productos -> getProductosByPedido($id);

			require_once 'views/pedido/detalle.php';
		}else{
			header("location:".base_url.'pedido/mis_pedidos');
		}

	}

	public function gestion(){
		Utils::isUser();
		$gestion = true;

		$pedido = new Pedido();
		$pedidos = $pedido -> getAll();

		require_once 'views/pedido/mis_pedidos.php';
	}

	public function estado(){
		Utils::isUser();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->edit();
			
			header("Location:".base_url.'pedido/detalle&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}


}

?>