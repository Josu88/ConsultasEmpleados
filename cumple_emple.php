<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba SQL</title>
  </head>
<body>
	<?php	
	//Definimos las variables para la conexion a la base de datos mysql
	$server = "localhost";  //seleccionamos el servidor
    $user = "root";         //seleccionamos el usuario 
    $pass = "root";      //seleccionamos la password
    $database = "empleados";   //seleccionamos la BD
    
    //abrimos la conexion
    $conexion = @mysqli_connect($server, $user, $pass, $database);

    if (mysqli_connect_errno($conexion)) {  //comprobamos la conexión
      echo "Fallo de conexión: \n" .mysqli_connect_error($conexion);
    } else {

	//Para que use la codificación de caracteres UTF8 al realizar la consulta
      mysqli_query($conexion,"set names'UTF8'");

	//Realizamos la consulta
      $consulta = "select * from empleado where date_format (fechanac, '%m') = date_format (now(), '%m')";
      if($res = mysqli_query($conexion, $consulta)){

	//Para ver el total de empleados de la consulta
       $total=mysqli_num_rows($res);

	//Creamos la tabla
       echo "<table border='1'><tr><td>NSS</td><td ALIGN='CENTER'>Nombre</td><td ALIGN='CENTER'>Apellido1</td><td ALIGN='CENTER'>Dirección</td><td ALIGN='CENTER'>Fechanac</td><td ALIGN='CENTER'>Sexo</td></tr>";

       while($dato=mysqli_fetch_array($res)){
        echo"<tr>";
        echo "<td ALIGN='CENTER'>".$dato['NSS']."</td>";
        echo "<td ALIGN='CENTER'>".$dato['Nombre']."</td>";
        echo "<td ALIGN='CENTER'>".$dato['Apel1']."</td>";
        echo "<td ALIGN='CENTER'>".$dato['Dirección']."</td>";
        echo "<td ALIGN='CENTER'>".$dato['Fechanac']."</td>";
        echo "<td ALIGN='CENTER'>".$dato['Sexo']."</td>";
        echo"</tr>";
      }
      echo "</table>";
      echo "Total de Personas Registradas : $total";
    }
    else {
               echo "La Tabla está vacia"; //Se muestra si no hay datos en la tabla
             }
	//Cerramos la conexión
             if (!mysqli_close($conexion)) {
              echo "Error al cerrar la conexión";
            }
          }
          ?>
          <br>	
          <!-- Enlace al formulario principal -->
          <a href="index.html">Pulsa aquí para volver al formulario inicial</a>
        </body>
        </html>