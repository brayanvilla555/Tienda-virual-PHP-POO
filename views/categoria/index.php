<h1>GESTIONAR CATEGORIAS</h1>

<?php if (isset($_SESSION['reg_categorias']) == 'complete'):?>
	<strong class="alert_green">Registro exitoso de la categoria</strong>
<?php elseif(isset($_SESSION['reg_categorias']) == 'failed'):?>
	<strong class="alert_red">Eror al registrar la categoria</strong>
<?php endif;?>
<?php Utils::deleteSession('reg_categorias');?>

<a href="<?=base_url?>categoria/crear" class="button button-small">
Crear categoria
</a>

<table >
	<tr>
		<th>Id</th>
		<th>Nombre</th>
	</tr>
	<?php while ($cat = $categorias->fetch_object()):?>
		<tr>
			<td><?= $cat->id;?></td>
			<td><?= $cat->nombre;?></td>
		</tr>
	<?php endwhile; ?>
</table>