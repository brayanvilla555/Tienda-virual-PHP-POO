
<!--barra lateral-->
<aside id="lateral">

	<div id="carrito" class="block_aside">
		<h3>Mi carrito</h3>
		<ul>
			<?php $stats = Utils::statsCarrito(); ?>

			<li><a href="<?=base_url?>carrito/index">Producto (<?=$stats['count']?>)</a></li>

			<li><a href="<?=base_url?>carrito/index">Total:S/.<?=$stats['total']?> </a></li>

			<li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
		</ul>
	</div>

	<div id="login" class="block_aside">
		<?php if (!isset($_SESSION['identityt'])):?>
			<h3>Iniciar sesion</h3>
		<form action="<?=base_url?>/usuario/login" method="POST">
			<label for="email">Email</label>
			<input type="email" name="email"/>

			<label for="password">Contraseña</label>
			<input type="password" name="password"/>

			<input type="submit" name="" value="Enviar"/>	
		</form>

		<?php else: ?>
			<h3>
				<?= $_SESSION['identityt']->nombre?>
				<?= $_SESSION['identityt']->apellidos?>
			</h3>
			<h3>
				<?= $_SESSION['identityt']->email?>
			</h3>
		<?php endif; ?>
		<ul>

			<?php if(isset($_SESSION['admin'])):?>
				<li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
				<li><a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a></li>
			<?php endif; ?>

			<?php if(isset($_SESSION['identityt'])):?>
				<li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
				<li><a href="<?=base_url?>usuario/logout">Cerra sesion</a></li>
			<?php else: ?>
			<li><a href="<?=base_url?>usuario/registro">crear usuario</a></li>

			<?php endif; ?>

		</ul>
	</div>
</aside> <!-- fin de barra lateral-->

<!--contenido central-->
<div id="central">