<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba SQL</title>
  </head>
<body>
	<?php	
  //usar composer
  require('./vendor/autoload.php');

  // __DIR__ location of the .env file
   $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

  //Definimos las variables para la conexion a la base de datos mysql
    $server = $_ENV['DB_HOST']; //seleccionamos el servidor
    $user = $_ENV['DB_USER'];         //seleccionamos el usuario 
    $pass = $_ENV['DB_PASSWORD'];      //seleccionamos la password
    $database =  $_ENV['DB_DATABASE'];  
    
    
	//abrimos la conexion
	  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conection = new mysqli($server, $user, $pass, $database);
      
  
    //Para que use la codificación de caracteres UTF8 al realizar la consulta
        mysqli_query($conection,"set names'UTF8'");


	//Realizamos la consulta
      $consulta = "SELECT * FROM empleado where EXTRACT(MONTH FROM Fechanac) = EXTRACT(MONTH FROM NOW())";
      if($res = mysqli_query($conection, $consulta)){
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
             if (!mysqli_close($conection)) {
              echo "Error al cerrar la conexión";
            }
      
          ?>
          <br>	
          <!-- Enlace al formulario principal -->
          <a href="index.html">Pulsa aquí para volver al formulario inicial</a>
        </body>
        </html>