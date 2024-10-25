<!DOCTYPE html>
<html>

<head>

    <title> Lista de Alumnos</title>
    <meta charset="UTF-8">
    <title>Eliminar Registro</title>
    <script>
    function confirmar() {
        return confirm("¿Estás seguro de que deseas eliminar este registro?");
    }
    </script>
    

    </script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
   
</head>

<body>
<?php
  include("conexion.php");
  //select *from alumnos
  $sql="select *from alumnos";
  $resultado=mysqli_query($conexion,$sql);


?>



    <h1> Lista de Alumnos</h1>
    <a href="agregar.php">Nuevo alumno</a><br><br>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th> No. Control</th>
                <th> Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
               while($filas=mysqli_fetch_assoc($resultado)){
            
            ?>
            <tr>
            <td> <?php echo $filas['id'] ?>  </td>
                <td> <?php echo $filas ['nombre']?> </td>
                <td> <?php echo $filas['nocontrol'] ?> </td>
                <td>
 <?php echo "<a href='editar.php?id=".$filas['id']."'>EDITAR</a>"; ?>
                    -
 <?php echo "<a href='eliminar.php?id=".$filas['id'] ."' onclick='return confirmar()'>ELIMINAR</a>";?>

                </td>

            </tr>
            <?php
               }

            ?>
        </tbody>
          
    </table>
    <?php

        mysqli_close($conexion);
    ?>

<body>
</html>