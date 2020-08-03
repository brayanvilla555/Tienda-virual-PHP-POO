<?php if(isset($_SESSION['identityt'])):?>
	<h1>HACER PEDIDO</h1>
	<p>
		<a href="<?=base_url?>carrito/index">Ver productos y el precio del pedido</a>
	</p>

	<h3>Direccion para el emvio</h3>
	<form action="<?=base_url?>pedido/add" method="POST" >

		<label for="provincia">Provincia</label>
		<input type="text" name="provincia" required/>

		<label for="localidad">Localida</label>
		<input type="text" name="localidad" required/>

		<label for="direccion">Direccion</label>
		<input type="text" name="direccion" required>

		<input type="submit" value="Confirmar pedido">

	</form>
<?php else:?>
		<h1>NECESITAS ESTAR IDENTIFICADO</h1>
		<p>Necesitas estar logueado en el sitio web para poder hacer tus pedidos</p>
<?php endif?>