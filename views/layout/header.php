<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset ="utf-8"/>
	<title>tienda online</title>
	<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>
<body>
	<div id="container">
		<!--cabecera-->
		<header id="header">
			<div id="logo">
				<img src="<?=base_url?>assets/img/camiseta.png" alt="TIENDA ONLINE">
				<a href="<?=base_url?>">
					SISTEMA DE PRACTICAS
				</a>
			</div>
		</header>
		<!--menu-->
		<?php $categorias = Utils::showCategorias();?>		
		<nav id="menu" class="">
			<ul>
				<li>
					<a href="<?=base_url?>">Inicio</a>
				</li>
				<?php while ($cat = $categorias->fetch_object()): ?>
					<li>				
						<a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
					</li>
				<?php endwhile;?>
			</ul>	
		</nav>
		<div id="content">		