<?php

	$Id = $_POST["id_usuario"];
    
    $mysqli = new mysqli('localhost', 'root', '', 'sistemadecitas');

             $query = "DELETE FROM usuarios WHERE id_usuario =".$Id;
             $result = $mysqli->query($query);
    
echo ' Alumno eliminado actualize la página porfavor';
              

              
            

?>
                
       