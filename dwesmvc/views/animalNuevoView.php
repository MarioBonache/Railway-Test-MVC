<!-- Incluimos la cabecera -->
<?php include_once("common/cabecera.php"); ?>

<!-- Vista para editar un elemento de la tabla -->

<body>
	<!-- Incluimos un menú para la aplicación -->
	<?php include_once("common/menu.php"); ?>

	<!-- Parte específica de nuestra vista -->
	<!-- Formulario para insertar un nuevo item -->
	<form action="index.php" method="post">
		<input type="hidden" name="controlador" value="animal">
		<input type="hidden" name="accion" value="nuevo">

		<?php echo isset($errores["id_anim"]) ? "*" : "" ?>
		<label for="id_anim">Codigo</label>
		<input type="text" name="id_anim">
		</br>

		<?php echo isset($errores["nombre"]) ? "*" : "" ?>
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre">
		</br>

		<?php echo isset($errores["alimentacion"]) ? "*" : "" ?>
		<label for="alimentacion">Alimentacion</label>
		<select name="alimentacion">
			<option name="Carnivora" value="Carnivora">Carnivora</option>
			<option name="Omnivora" value="Omnivora" selected>Omnivora</option>
			<option name="Hervibora" value="Hervibora">Hervibora</option>
		</select>
		</br>

		
		<label for="nombre">exotico</label>
		<select name="exotico">
			<option name="exotico" value="0" selected>No</option>
			<option name="exotico" value="1">Si</option>
			
		</select>
		</br>

		<input type="submit" name="submit" value="Aceptar">
	</form>
	</br>

	<?php
	// Si hay errores se muestran
	if (isset($errores)):
		foreach ($errores as $key => $error):
			echo $error . "</br>";
		endforeach;
	endif;
	?>

	<!-- Incluimos el pie de la página -->
	<?php include_once("common/pie.php"); ?>
</body>

</html>