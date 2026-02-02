<!-- Incluimos la cabecera -->
<?php include_once("common/cabecera.php"); ?>

<!-- Vista para editar un elemento de la tabla -->

<body>
	<!-- Incluimos un menú para la aplicación -->
	<?php include_once("common/menu.php"); ?>

	<!-- Parte específica de nuestra vista -->
	<form action="index.php" method="post">
		<input type="hidden" name="controlador" value="animal">
		<input type="hidden" name="accion" value="editar">

		<label for="id_anim">Codigo</label>
		<input type="text" name="id_anim" value="<?php echo $animal->getid_anim(); ?>" readonly>
		</br>

		<?php echo isset($errores["nombre"]) ? "*" : "" ?>
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?php echo $animal->getnombre(); ?>">
		</br>



		<?php echo isset($errores["alimentacion"]) ? "*" : "" ?>
		<label for="alimentacion">Alimentacion</label>
		<select name="alimentacion">
			<option name="Carnivora" value="Carnivora">Carnivora</option>
			<option name="Omnivora" value="Omnivora" selected>Omnivora</option>
			<option name="Hervibora" value="Hervibora">Hervibora</option>
		</select>
		</br>

		<?php echo isset($errores["exotico"]) ? "*" : "" ?>
		<label for="nombre">exotico</label>
		<select name="exotico">
			<?php
			if ($animal->getexotico() === 0)
			{
			?>
				<option name="exotico" value="0" selected>No</option>
				<option name="exotico" value="1" >Si</option>
			<?php
			}
			else{
			?>
				<option name="exotico" value="0" >No</option>
				<option name="exotico" value="1" selected>Si</option>
			<?php
			}
			?>
			
		</select>

		<input type="submit" name="submit" value="Aceptar">
	</form>
	</br>

	<?php
	// Si hay errores los mostramos.
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