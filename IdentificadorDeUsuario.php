<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SistemaDeCitas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$contra= $_POST['Contrasenia'];
$ID= $_POST['Matricula'];


$sql = "SELECT * FROM usuarios WHERE Contrasenia='$contra' AND Matricula='$ID'" ;
$sqlu= "SELECT Nombre FROM usuarios WHERE Matricula='$ID'";

$res= $conn->query($sql);			
$resu= $conn->query($sqlu);
$resul= $res->fetch_assoc();
$conn->close();

for ($setu = array (); $rowu = $resu->fetch_assoc(); $setu[] = $rowu['Nombre']);



	

	if ($resul && $setu[0]=="admin"){
		
		$_SESSION['user']= $setu[0];
		header("Location: Admin.php");
			
	} elseif ($resul){
		
		$_SESSION['name']= $setu[0];
		header("Location: ../../usuario.php");
		
	} else {

		header("Location: ../index.html");
		echo "Usuario o contraseña incorrectos";
	}
		
		



?>
