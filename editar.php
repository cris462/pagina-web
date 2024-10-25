 <?php
 include("conexion.php");
                   

?>

<html>
    <head>
        <title> EDITAR</title>
      <link rel="stylesheet" type="text/css" href="estilos.css">

    </head>
    <body>
        <?php
            
if (isset($_POST['enviar'])) {
    if (isset($_POST['enviar'])) {
    // Aquí entra cuando se presiona el botón enviar
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nocontrol = $_POST['nocontrol'];

    // Usar consultas preparadas para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE alumnos SET nombre = ?, nocontrol = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nombre, $nocontrol, $id); // 'ssi' indica tipos: s=string, i=integer
    $resultado = $stmt->execute();

    if ($resultado) {
        echo "<script language='JavaScript'>
        alert('Los datos fueron ingresados correctamente a la bd');
        location.assign('index.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos no fueron ingresados correctamente a la bd');
        location.assign('index.php');
        </script>";
    }
    $stmt->close();
    mysqli_close($conexion);
}


} else {
    // Aquí entra si no se ha presionado el botón enviar
    $id = $_GET['id'];
    $sql = "SELECT * FROM alumnos WHERE id = '".$id."';";  // Comillas y punto y coma corregidos
    $resultado = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombre = $fila["nombre"];
        $nocontrol = $fila["nocontrol"];
    }

    mysqli_close($conexion);
}
?>


        <h1> Editar Alumno </h1>
        <form action="<?=$_SERVER  ['PHP_SELF']?>"  method="post">
            <label>Nombre:</label>
<input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"> <br>


            <label>No. Control:</label>
<input type="text" name="nocontrol" value="<?php echo htmlspecialchars($nocontrol); ?>"> <br>
             
             <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">


            <input type="submit" name="enviar" value="ACTUALIZAR">
            <a href="index.php">Regresar</a>
        </form>
         <?php
                   
        

          ?>

         
    </body>
</html>
   

