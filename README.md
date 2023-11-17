# ConsultasEmpleados

Es una aplicación hecha en php que hace consultas sobre una base de datos de empleados en mysql.

# Preparación

- Para poder ver el proyecto primero instalaremos los siguientes programas:

1. Vamos a está web: https://getcomposer.org/download/ y descargamos el descargable de windows(Windows Instaler), pinchado en el enlace llamado Composer-Setup.exe.
2. Instalamos el programa marcando todas las opciones.
3. Necesitamos tener instalado el xampp un servidor con apache,mysql y más cosas, lo descargamos aquí https://www.apachefriends.org/es/download.html, elegimos la versión que tiene el mayor tamaño. y pulsamos en Descargar(64 bit).
4. Lo instalamos,al terminar de instalarlo, abrimos el panel de control del xampp y pulsamos en start de Apache y mysql.
5. Ejecutaremos el comando composer init en la terminal de nuestro ide.
6. Daremos enter a las preguntas que nos van apareciendo, hasta que nos pregunte Would you like to define your dependencies (require) interactively [yes]? a lo que pondremos no,Add PSR-4 autoload mapping? Maps namespace "Velve\ConsultasEmpleados" to the entered relative path. [src/, n to skip]: a lo que pondremos src/, Do you confirm generation [yes]? a que pondremos yes, Would you like the vendor directory added to your .gitignore [yes]? a lo que pondremos yes y listo.
7. Ejecutames el comando composer require vlucas/phpdotenv para instalar una dependencia con composer.

# Instalación

- Para poder ver el proyecto hacemos lo siguiente:

1. Descargamos del repositorio en github, pulsando en Code y pulsando en Download zip o copiando la url que nos muestra ahí y usando git clone la url copiada en nuestro ide, esta carpeta la ponemos en C:\xampp\htdocs.
2. una vez descargado, abrimos la carpeta con el ide que tengamos, vamos al archivo .env y modificamos los valores de las variables que empiezan por db por los valores de nuestra base de datos instalada para poder realizar la conexion con la base de datos.
3. Ejecutamos el archivo Empleados.sql en el administrador de la base de datos que tengamos para tener instalada la base de datos.
4. Abrimos el archivo index.html con el servidor php del ide para ver el programa.

# Base de Datos

## Nombre: Empleados

- La estructura de la base de datos es la siguiente:

## Tabla: empleadoproyecto

### CAMPOS:

- NSS varchar(6) PRIMARY KEY
- NUMPROY INT PRIMARY KEY y FOREIGN KEY(tabla proyecto campo Numproy)
- NUMHORAS INT
- PRIMARY KEY COMPUESTA(NSS y NUMPROY)

## Tabla: propuestas

### CAMPOS:

- IDpropuesta INT PRIMARY KEY
- Nssempleado VARCHAR(6) FOREIGN KEY(tabla empleadosproyecto campo:NSS)
- Descripcion LONGTEXT
- FechaPropuesta DATETIME

## Tabla: departamento

### CAMPOS:

- Num dep TINYINT PRIMARY KEY
- Nombredep VARCHAR(15)
- Numempdep INT
- NSSgerente VARCHAR(50)
- fechainicgerente DATETIME

## Tabla: empleado

### CAMPOS:

- NSS VARCHAR(6) PRIMARY KEY
- Nombre VARCHAR(15)
- Apel1 VARCHAR(15)
- Apel2 VARCHAR(15)
- Sexo VARCHAR(2)
- Dirección VARCHAR(30)
- Fechanac DATETIME
- Salario INT
- Num dept TINYINT FOREING KEY(tabla departamento campo Numdep)
- NSSsup VARCHAR(6) FOREING KEY(tabla propuestas campo Nssempleado)

## Tabla: proyecto

### CAMPOS:

- Numproy INT PRIMARY KEY
- Nombreproy VARCHAR(15)
- Lugarproy VARCHAR(20)
- Numdep TINYINT

## Tabla: departamento-ubi

### CAMPOS:

- Numdep TINYINT FOREING KEY(tabla departamento campo Numdep)
- Lugardep VARCHAR(15) PRIMARY KEY
