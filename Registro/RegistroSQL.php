<?php  
include 'cn.php';
//resibir los datos y almacenar en variables
$Nombre = $_POST["Nombre"];
$Matricula = $_POST["Matricula"];
$Area = $_POST["Area"];
$Paterno = $_POST["Paterno"];
$Materno = $_POST["Materno"];
$Email = $_POST["Email"];
$Contrasenia = $_POST["Contrasenia"];
$Contrasenia2 = $_POST["Contrasenia2"];


if($Contrasenia==$Contrasenia2)
{

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM alumnos WHERE nombre_alumno = '$Nombre'");
$verificar_correo = mysqli_query($conexion, "SELECT * FROM alumnos WHERE email_alumno = '$Email'");


//consulta para insertar
$insertar = "INSERT INTO alumnos(id_alumno_sistema,id_alumno,nombre_alumno,email_alumno,area_alumno,pass_alumno) VALUES (NULL,'$Matricula', '$Nombre','$Email','$Area','$Contrasenia')";
//Ejecutar Consulta



if (mysqli_num_rows($verificar_usuario) > 0)
	{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
      
       				 window.location.href='registro.php'
         			 window.alert('El usuario ya existe no se hizo la petición')
       				 </SCRIPT>");
		
				
	}

	else if(mysqli_num_rows($verificar_correo) > 0)
	{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
      
       				 window.location.href='registro.php'
         			 window.alert('Ese correo ya esta registrado')
       				 </SCRIPT>");
					
	}

	else
	{


				$resultado = mysqli_query($conexion, $insertar);

				if (!$resultado) 
					{
		
						echo ("<SCRIPT LANGUAGE='JavaScript'>
       
       				
       					  window.alert('Petición fallo')
        			</SCRIPT>");
				}
				else
				{
					echo ("<SCRIPT LANGUAGE='JavaScript'>
      
       				 window.location.href='vertabla.php'
         			 window.alert('Petición realizada exitosamente')
       				 </SCRIPT>");
				}
				//cerrar Conexión
				mysqli_close($conexion);
	}
}

else
{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
      
       				 window.location.href='RegistroAlumno.php'
         			 window.alert('Las contraseñas no coinciden')
       				 </SCRIPT>");

		mysqli_close($conexion);
	

}