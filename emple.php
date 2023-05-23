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
	
	//Definimos las variables para conectar el formulario con el php
	$sexo = $_GET["sexo"];
	$non = $_GET["Nombre"];
	$ape1 = $_GET["apel1"];	
	$ape2 = $_GET["apel2"];	

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
	  	$consulta = "SELECT * FROM empleado where Nombre='$non' and Apel1='$ape1' and Apel2='$ape2' and Sexo='$sexo'";
	  	if($res = mysqli_query($conection,$consulta)){

	  		//Para ver el total de empleados de la consulta
	  		$total=mysqli_num_rows($res);

			//Creamos la tabla
	  		echo "<table border='1'><tr><td ALIGN='CENTER'>NSS</td><td ALIGN='CENTER'>Nombre</td><td ALIGN='CENTER'>Apellido1</td><td ALIGN='CENTER'>Apellido2</td><td ALIGN='CENTER'>Direción</td><td ALIGN='CENTER'>Fechanac</td><td ALIGN='CENTER'>Sexo</td><td ALIGN='CENTER'>Salario</td></tr>";

	  		while($dato=mysqli_fetch_array($res)){
	  			echo"<tr>";
	  			echo "<td ALIGN='CENTER'>".$dato['NSS']."</td>";
	  			echo "<td ALIGN='CENTER'>".$dato['Nombre']."</td>";
	  			echo "<td ALIGN='CENTER'>".$dato['Apel1']."</td>";
	  			echo "<td ALIGN='CENTER'>".$dato['Apel2']."</td>";
	  			echo "<td ALIGN='CENTER'>".$dato['Dirección']."</td>";
	  			echo "<td ALIGN='CENTER'>".$dato['Fechanac']."</td>";
	  			echo "<td ALIGN='CENTER'>".$dato['Sexo']."</td>";
	  			echo "<td ALIGN='CENTER'>". $dato['Salario']."</td>";
	  			echo"</tr>";
	  		}

	  		echo "</table>";
	  		echo "Total de Personas Registradas : $total<br>";
	  	}
	  	else {
               echo "La Tabla está vacia"; //Se muestra si no hay datos en la tabla
           }

           //Comprobación de campos vacios
           if (empty($_GET['sexo'])) {
           	echo "El campo sexo está vacío<br>";
           }
           if (empty($_GET['Nombre'])) {
           	echo "El campo Nombre está vacío<br>";           	
           }
           if (empty($_GET['apel1'])) {
           	echo "El campo apel1 está vacío<br>";
           }
           if (empty($_GET['apel2'])) {
           	echo "El campo apel2 está vacío<br>";
           }
           //Cerramos la conexión
           if (!mysqli_close($conection)) {
           	echo "Error al cerrar la conexión<br>";
           }
       
       ?>
       <br>
       <!-- Enlace al formulario principal -->
       <a href="index.html">Pulsa aquí para volver al formulario inicial</a>
   </body>
   </html>