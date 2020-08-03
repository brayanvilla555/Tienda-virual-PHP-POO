<?php if(isset($producto_ver)): ?>
	<h1><?=$producto_ver->nombre?></h1>
	<div id="detail-product">
		<div class="image">
		<?php if($producto_ver->imagen != null):?>
			<img src="<?=base_url?>uploads/images/<?=$producto_ver->imagen?>"/>
		<?php else:?>
				<img src="<?=base_url?>assets/img/camiseta.png"/>
		<?php endif;?>
		</div>
		<div class="data">
			<p>S/.<?=$producto_ver->precio?></p>
			<p><?=$producto_ver->descripcion?></p>
			<a href="<?=base_url?>carrito/add&id=<?=$producto_ver->id?>" class="button">Comprar</a>
		</div>
	</div>
<?php else:?>
	<h1>EL PRODUCTO NO EXISTE</h1>
<?php endif;?>