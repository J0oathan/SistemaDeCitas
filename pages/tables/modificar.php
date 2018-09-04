<?php

	$id_usuario = $_POST["id_usuario"];
    $nombre_usuario = $_POST["nombre_usuario"];	
    $paterno_usuario = $_POST["paterno_usuario"];
   	$materno_usuario = $_POST["materno_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $area_usuario = $_POST["area_usuario"]; 
    $Tipo_usuario=$_POST["Tipo_usuario"]; 
    
    
echo ' 
 
          <div id="SuperSeccion"> 
           <fieldset name="datos" ><legend>Modificar datos</legend>


          <form id=formulario enctype="multipart/form-data" method="POST" action="data.php">
          
        Nombre del alumno
          <input  type="text" id="nombre_usuario" name="nombre_usuario" value="'.$nombre_usuario.'" required />
          <br><br>
           Paterno
          <input  type="text" id="paterno_usuario"  name="paterno_usuario" min="0" max="1000"  value="'.$paterno_usuario.'" required /> 
           <br><br>
           Materno
          <input  type="text" id="materno_usuario" name="materno_usuario"  value="'.$materno_usuario.'"  required />
          <br><br>
          Email
            <input  type="text" id="email_usuario" name="email_usuario" value="'.$email_usuario.'"  />
          <br><br>  
             Area
            <input  type="text" id="area_usuario" name="area_usuario" value="'.$area_usuario.'"  /><br>
            Tipo usuaio
            <input  type="text" id="area_usuario" name="area_usuario" value="'.$Tipo_usuario.'"  />

            <input  type="hidden" id="id_usuario" name="id_usuario" value="'.$id_usuario.'"  />
            
            <br>

       
           <input type="submit" name="" value="Actualizar"  onClick="reload" >
          </p>
          </form>

         
      </fieldset>
</div>
          
';
              

              
            

?>
     