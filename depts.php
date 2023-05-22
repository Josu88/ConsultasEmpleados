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
    	$consulta = "SELECT * FROM departamento";
    	if($res = mysqli_query($conexion, $consulta)){

	//Para ver el total de empleados de la consulta
    		$total=mysqli_num_rows($res);

	//Creamos la tabla
    		echo "<table border='1'><tr ALIGN='CENTER'><td ALIGN='CENTER'>Numdep</td><td ALIGN='CENTER'>Nombredep</td></tr>";

    		while($dato=mysqli_fetch_array($res)){
    			echo"<tr>";
    			echo "<td ALIGN='CENTER'>".$dato['Numdep']."</td>";
    			echo "<td ALIGN='CENTER'>".$dato['Nombredep']."</td>";
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
          <a href="formulario_dept.html">Consultar empleados de un departamento</a>
        </body>
        </html>