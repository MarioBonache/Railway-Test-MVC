<!-- Incluimos la cabecera -->
<?php include_once("common/cabecera.php"); ?>

<!-- Vista para editar un elemento de la tabla -->

<body>

    <!-- Incluimos un menú para la aplicación -->
    <?php include_once("common/menu.php"); ?>

    <!-- Parte específica de nuestra vista -->
    <table style="text-align:center">
        <tr>
            <th>&nbsp&nbsp&nbspid_animal&nbsp&nbsp&nbsp</th>
            <th>&nbsp&nbsp&nbspNombre&nbsp&nbsp&nbsp</th>
            <th>&nbsp&nbsp&nbspalimentacion&nbsp&nbsp&nbsp</th>
            <th>&nbsp&nbsp&nbspexotico&nbsp&nbsp&nbsp</th>
        </tr>
        <?php
        foreach ($animals as $animal) {
            ?>
            <tr>
                <td>
                    <?php echo $animal->getid_anim() ?>
                </td>
                <td>
                    <?php echo $animal->getnombre() ?>
                </td>
                <td>
                    <?php echo $animal->getalimentacion() ?>
                </td>
                <td>
                    <?php echo $animal->getexotico() ?>
                </td>
                <td>
                    <a href="index.php?controlador=animal&accion=editar&id_anim=<?php echo $animal->getid_anim() ?>">&nbspEditar&nbsp</a>
                </td>
                <td>
                    <a href="index.php?controlador=animal&accion=borrar&id_anim=<?php echo $animal->getid_anim() ?>">&nbspBorrar&nbsp</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <a href="index.php?controlador=animal&accion=nuevo">&nbsp&nbsp&nbspNuevo</a>

    <!-- Incluimos el pie de la página -->
    <?php include_once("common/pie.php"); ?>
</body>

</html>