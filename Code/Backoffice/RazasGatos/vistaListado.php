<?php // --------------------------------------------

require "controller.php";
$listadoGatos = listar();

// -------------------------------------------------- ?> 
<script src="controller.js"></script>

<h1>Vista Listado</h1>

<br>

<input type="button" value="Crear" id="formularioAltaRazas" onclick="mostrarFormularioAltaRazas()">

<br>
<br>

<table>
    <head>
        <th>Raza</th>
        <th>Acciones</th>
    </head>
    <body>
    <?php while($razaGato = mysqli_fetch_assoc($listadoRazas)) : ?>
        <tr>
            <td>
                <?php echo $razaGato['Nombre'] ?>         
            </td>
            <td>
                <input type="button" value="Modificar" onclick="mostrarFormularioModificarRaza(<?php echo $razaGato['Id']?>)">
                <input type="button" value="Eliminar" onclick="eliminar(<?php echo $razaGato ['Id']?>)">
            </td>
        </tr>
    <?php endwhile; ?>
    </body>
</table>