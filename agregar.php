<html>
    <head>
        <title>AGREGAR</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
   </head>
    <body>
        <?php
        if(isset($_POST["enviar"])){
            $nombre=$_POST['nombre'];
            $nocontrol= $_POST['nocontrol'];

            include("conexion.php");
            //insert into alumnos(nombre,nocontrol)
            //values($nombre,$nocontrol)
           $sql = "insert into alumnos (nombre, nocontrol) 
           VALUES ('".$nombre."', '".$nocontrol."')";

          $resultado=mysqli_query($conexion,$sql);
          
          if($resultado){
            //los datos ingresaron a la bd
            echo "<script language='JavaScript'>
            alert('Los datos fueron ingresados correctamente a la bd');
            location.assing('index.php');
            </script>";
          }else{
            //los datos NO ingresaron a la bd
            echo "<script language='JavaScript'>
            alert('ERROR:Los datos no fueron ingresados correctamente a la bd');
            location.assing('index.php');
            </script>";
          }
          mysqli_close($conexion);



        } else {

            }
        ?>


        <h1>Agregar Nuevo Alunno</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Nombre:</label>
            <input type="text" name = "nombre"> <br>
            <label>No. Control</label>
            <input type="text" name = "nocontrol"> <br>
            <input type="submit" name = "enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
    </body>
</html>