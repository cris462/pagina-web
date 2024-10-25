<?php
$id=$_GET['id'];
include("conexion.php");

$sql="delete from alumnos where id='".$id."'";
$resultado=mysqli_query($conexion,$sql);
                    
if ($resultado) {
        echo "<script language='JavaScript'>
        alert('Los datos se eliminaron correctamente a la bd');
        location.assign('index.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos no se eliminaron correctamente a la bd');
        location.assign('index.php');
        </script>";
    }       

 ?>