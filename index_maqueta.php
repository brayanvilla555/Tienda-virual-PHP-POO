<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset ="utf-8"/>
	<title>tienda online</title>
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	<div id="container">
	<!--cabecera-->
	<header id="header">
		<div id="logo">
			<img src="assets/img/camiseta.png" alt="TIENDA ONLINE">
			<a href="index.php">
				Tienda de camisetas
			</a>
		</div>
	</header>
	<!--menu-->
	<nav id="menu" class="">
		<ul>
			<li>
				<a href="#">Inicio</a>
			</li>
			<li>				
				<a href="#">categoria 1</a>
			</li>
			<li>				
				<a href="#">categoria 2</a>
			</li>
			<li>				
				<a href="#">categoria 3</a>
			</li>
			<li>				
				<a href="#">categoria 4</a>
			</li>
		</ul>	
	</nav>
	<div id="content">
		 <!--barra lateral-->
		<aside id="lateral">
			<div id="login" class="block_aside">
				<form action="#" method="POST">
					<label for="email">Email</label>
					<input type="email" name="email"/>

					<label for="password">Contraseña</label>
					<input type="password" name="password"/>

					<input type="submit" name="" value="Enviar"/>	
				</form>
				<ul>
					<li>
						<a href="#">Mis pedidos</a>
					</li>
					<li>
						<a href="#">Gestionar pedidos</a>
					</li>
					<li>
						<a href="#">Gestionar categorias</a>
					</li>
				</ul>
			</div>
		</aside> <!-- fin de barra lateral-->

	     <!--contenido central-->
	     <div id="central">
	     	<div class="product">
	     		<img src="assets/img/camiseta.png"/>
	     		<h2>camiseta Azul Ancha</h2>
	     		<p>30 euros</p>
	     		<a href="" class="button">Comprar</a>
	     	</div>
	     	<div class="product">
	     		<img src="assets/img/camiseta.png"/>
	     		<h2>camiseta Azul Ancha</h2>
	     		<p>30 euros</p>
	     		<a href="" class="button">Comprar</a>
	     	</div>
	     	<div class="product">
	     		<img src="assets/img/camiseta.png"/>
	     		<h2>camiseta Azul Ancha</h2>
	     		<p>30 euros</p>
	     		<a href="" class="button">Comprar</a>
	     	</div>
	     </div>
	</div><!--fin de contenido central-->

	<footer id="footer">	<!--pie de pagina-->
		<p>Desarrollado por Bryana &copy;<?= date('Y') ?> </p>
	</footer><!-- fin de pie de pagina-->
	 </div>


</body>
</html>