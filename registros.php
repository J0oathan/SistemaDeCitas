
<?php

$localhost="localhost";$user="root";$contra="";$db="sistemadecitas";
$mysqli = new mysqli($localhost,$user,$contra,$db);
if ($mysqli->connect_errno) {echo "Error al conectar a la DB"; exit;
}else{echo "Conexión exitosa";
}


$nombre=$_POST['nombre'];
$fechaClick=$_POST['fecha'];
$inicio_h=$_POST['inicio_h'].":00";
$fin_h=$_POST['fin_h'].":00";
$color=$_POST['color'];

/*
echo "$nombre";
echo "$inicio_h";
echo "$fin_h";*/
//$colision="SELECT * FROM citas WHERE inicio_d AND inicio_h";
$insert="INSERT INTO citas (id,nombre,inicio_d,inicio_h,fin_d,fin_h,className,editable,url,color) VALUES (NULL,'$nombre','$fechaClick','$inicio_h','$fechaClick','$fin_h',NULL,NULL,NULL,'$color')";
//INSERT INTO `citas`(`id`, `nombre`, `inicio_d`, `inicio_h`, `fin_d`, `fin_h`, `className`, `editable`, `url`) VALUES (NULL,"FIFO","2018-03-12","09:00:00","2018-03-12","11:00:00",NULL,NULL,NULL)
 $res2=$mysqli->query($insert);
 /*if ($mysqli->query($insert) === TRUE) {
     echo "New record created successfully";
 } else {
     echo "Error: " . $insert . "<br>" . $mysqli->error;
 }
  //if (isset($nombre,$inicio_d,$inicio_h,$fin_d,$fin_h)){
    /*$nombre=$_POST['nombre'];
    $inicio_h=$_POST['inicio_h'].":00";
    $fin_h=$_POST['fin_h'].":00";
          //}else {
            //  $nombre="";$inicio_d="";$inicio_h="";$fin_d="";$fin_h="";
          //  }
          /*$localhost="localhost";$user="root";$contra="";$db="labquim";
          $mysqli = new mysqli($localhost,$user,$contra,$db);
          if ($mysqli->connect_errno) {echo "Error al conectar a la DB"; exit;
          }else{echo "Conexión exitosa";
          }*/
/*  $insert="INSERT INTO citas (nombre,inicio_d,inicio_h,fin_d,fin_h) VALUES ($nombre,$fechaClick,$inicio_h,$fechaClick,$fin_h)";
  $res2=$mysqli->query($insert);
  if ($mysqli->query($insert) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $insert . "<br>" . $mysqli->error;
  }*/
?>
