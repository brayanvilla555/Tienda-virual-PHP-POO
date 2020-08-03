<h1>GESTION DE PRODUCTOS</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
Crear productos
</a>
<!--=========ALERTA PARA DE ELIMINADO registro exitoso===========-->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'):?>
	<strong class="alert_green">Registro exitoso del producto</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] !=  'complete'):?>
	<strong class="alert_red">Eror al registrar el producto</strong>
<?php endif;?>
<?php Utils::deleteSession('producto');?>
<!--=========ALERTA PARA DE ELIMINADO CORCTO===========-->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
	<strong class="alert_green">Registro eliminado exitoso</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] !=  'complete'):?>
	<strong class="alert_red">Eror al eliminar</strong>
<?php endif;?>
<?php Utils::deleteSession('delete');?>


<table >
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Precio</th>
		<th>Stock</th>
		<th>Fecha</th>
		<th>Acciones</th>
	</tr>
	<?php while ($pro = $productos->fetch_object()):?>
		<tr>
			<td><?= $pro->id;?></td>
			<td><?= $pro->nombre;?></td>
			<td><?= $pro->descripcion;?></td>
			<td><?= $pro->precio;?></td>
			<td><?= $pro->stock;?></td>
			<td><?= $pro->fecha;?></td>
			<td>
				<a class="button button-gestion" href="<?=base_url?>producto/editar&id=<?=$pro->id?>">Editar</a>
				<a class="button button-gestion button-red" href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>
</table>