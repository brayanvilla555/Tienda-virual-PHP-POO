<h1>DETALLE DEL PEDIDO</h1>

	<?php if(isset($pedido)):?>
		<?php if (isset($_SESSION['admin'])): ?>
			<h3>Cambiar el estado del pedido</h3>
			<form action="<?=base_url?>pedido/estado" method="POST">
				<input type="hidden" value="<?=$pedido->id?>" name="pedido_id" />
				<select name="estado">
					<option value="confirm"  <?= $pedido->estado == 'confirm' ? 'selected' : ''?> >Pendiente</option>
					<option value="preparation"  <?= $pedido->estado == 'preparation' ? 'selected': ''?> >En preparacion</option>
					<option value="ready"  <?= $pedido->estado == 'ready' ? 'selected' : ''?> >Preparado para enviar</option>
					<option value="sended"  <?= $pedido->estado == 'sended' ?'selected' : ''?> >Enviado</option>
				</select>
				<input type="submit" value="Cambiar estado">
			</form>
			<br/>
		<?php endif ?>

		<h3>Datos del pedido</h3>
		Provincia: <?=$pedido->provincia?><br/>
		Ciudad: <?=$pedido->localidad?><br/>
		Direccion: <?=$pedido->direccion?>

		<h3>Datos del pedido</h3>
		Estado: <?=Utils::showStatus($pedido->estado);?><br/>
		N° de pedido:<?=$pedido->id?><br/>
		Total ha pagar: S/.<?=$pedido->coste?><br/>
		Productos:
			<table>
				<tr style="background-color:#2BC9E1;">
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
				</tr>
			<?php while($producto  = $productos->fetch_object()):?>
				<tr>
					<td>
						<?php if($producto->imagen != null):?>
							<img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito"/>
						<?php else:?>
								<img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" />
						<?php endif;?>
					</td>
						<td><?= $producto->nombre?></td>
						<td>S/.<?=$producto->precio?></td>
						<td><?=$producto->unidades?></td>
					</tr>
			<?php endwhile;?>
			</table>

	<?php endif?>	