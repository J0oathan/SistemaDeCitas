<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemadecitas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Password= $_POST['Password'];
$Matricula= $_POST['Matricula'];


$sql = "SELECT * FROM usuarios WHERE id_usuario='$Matricula' AND pass_usuario='$Password'" ;
$sqlu= "SELECT Tipo_usuario FROM usuarios WHERE pass_usuario='$Password'";

$res= $conn->query($sql);			
$resu= $conn->query($sqlu);
$resul= $res->fetch_assoc();	
$conn->close();

for ($setu = array (); $rowu = $resu->fetch_assoc(); $setu[] = $rowu['Tipo_usuario']);



	if ($resul && $setu[0]==1){
		
		$_SESSION['user']= $setu[0];
		header("Location: ../index.html");
			
	} elseif ($resul  && $setu[0]==2){
		
		$_SESSION['name']= $setu[0];
		header("Location: Profesores.php");
		
	} else {

		echo "<script>alert('Contraseña o Usuario es incorrecto.');location.href ='../../../index.php';</script>";

		
		
		
	}
		
		
?>
