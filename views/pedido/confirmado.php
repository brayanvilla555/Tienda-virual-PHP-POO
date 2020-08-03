<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'):?>
	<h1 class="alert_green">TU PEDIDO SE HA CONFIRMADO EXITOSAMENTE</h1>
	<p>
		tu pedido se ha confirmado  con exito, una ves que realice la transferncia bancaria 777978978ADD con el pedido, sera procesado y enviado
	</p>
	<br/>
	<?php if(isset($pedido)):?>
		<h3>Datos del pedido</h3>

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
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'):?>
	<h1 class="alert_red">TU PEDIDO NO SE HA PODIDO PROCESAR</h1>
<?php endif;?>


