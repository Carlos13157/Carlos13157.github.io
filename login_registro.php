<?php

include("conexion.php");

$nombre = $_POST["Correo"];
$pass   = $_POST["Contraseña"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM tabla WHERE Correo='$nombre' AND Contraseña = '$pass' ");
	$nr = mysqli_num_rows($query);
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
	}else
	{
		echo "<script> alert('Correo no existe'); window.location='index.html' </script>";
	}
}

//Registrar
if(isset($_POST["btnlogin"]))
{
	$sqlgrabar = "INSERT INTO tabla(Correo,Contraseña) values ('$nombre','$pass')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Correo registrado con exito: $nombre'); window.location='portafolio.html' </script>";
	}else 
	{
		echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
	}
}


?>