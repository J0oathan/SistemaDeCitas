<?php  
include '../cn.php';
//resibir los datos y almacenar en variables
$Nombre = $_POST["Nombre"];
$Matricula = $_POST["id"];
$Area = $_POST["Area"];
$Paterno = $_POST["Paterno"];
$Materno = $_POST["Materno"];
$Email = $_POST["Email"];
$Contrasenia = $_POST["Contrasenia"];
$Contrasenia2 = $_POST["Contrasenia2"];


if($Contrasenia==$Contrasenia2)
{

$verificar_matricula = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuario = '$Matricula'");
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email_usuario = '$Email'");


//consulta para insertar
$insertar = "INSERT INTO usuarios(id_usuario_sistema,id_usuario,nombre_usuario,paterno_usuario,materno_usuario,email_usuario,area_usuario,pass_usuario,Tipo_usuario) VALUES (NULL,'$Matricula', '$Nombre','$Paterno','$Materno','$Email','$Area','$Contrasenia',1)";




//Ejecutar Consulta



if (mysqli_num_rows($verificar_matricula) > 0)
	{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
      
       				
         			 window.alert('Matricula o email repetido')
         			  window.history.go(-1);
       				 </SCRIPT>");
		
				
	}

	else if(mysqli_num_rows($verificar_correo) > 0)
	{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
      
         			 window.alert('El correo ya esta registrado')

       				 window.history.go(-1);
       				 </SCRIPT>");
					
	}

	else
	{


				$resultado = mysqli_query($conexion, $insertar);

				if (!$resultado) 
					{
		
						echo ("<SCRIPT LANGUAGE='JavaScript'>
       
       				
       					  window.alert('Petición fallo')

       						 window.history.go(-1);
        			</SCRIPT>");
				}
				else
				{
					echo ("<SCRIPT LANGUAGE='JavaScript'>
      
         			 window.alert('Petición realizada exitosamente')
         			 window.location.href ='../tables/data.php';
       				 </SCRIPT>");
				}
				//cerrar Conexión
				mysqli_close($conexion);
	}
}

else
{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
      
       					window.history.go(-1);
         			 window.alert('Las contraseñas no coinciden')
       				 </SCRIPT>");

		mysqli_close($conexion);
	

}