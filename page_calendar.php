<!doctype html>
<?php
  $localhost="localhost";$user="root";$contra="";$db="sistemadecitas";
  $mysqli = new mysqli($localhost,$user,$contra,$db);
  if ($mysqli->connect_errno) {echo "Error al conectar a la DB"; exit;
  }else{//echo "Conexión exitosa";
  }
  $query="SELECT * FROM citas";
  $res=$mysqli->query($query);
?>
 <html lang="en">
	<head>
		<meta charset="UTF-8">
    <title>Calendario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' href='assets/fullcalendar.css' />
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.0/fullcalendar.css"/>
    <script src='assets/jquery.min.js'></script>
    <!--<script src='assets/jquery.js'></script>-->
    <script src='assets/moment.min.js'></script>
    <script src='assets/fullcalendar.js'></script>
    <script src='assets/es.js'></script>
    <script src='assets/locale-all.js'></script>
    <style>
      .Disponible{background-color: green;border-radius:6px;}
      .NoDisponible{background-color: red;border-radius: 6px;}
    </style>
    <script>
    /*propiedad slotEventOverlap te permite evitar que los eventos se pisen entre ellos peroesta implementación
     implica que algunos eventos sean reducidos al mostrarse. Por defecto ésta propiedad está activada, es necesario ponerla en falsepara obtener la funcionalidad que deseas. También cabe mencionar que esta ...*/

      $(document).ready(function(){
        //obj. document hace ref. a todo el doc.
        //ready hace que se cargue toda la página y ya luego se dispara
        //página lista, inicializa el calendario...
        $('#calendar').fullCalendar({
          height:'auto',
          header: {
    				//left: 'prev,next today',
    				//center: 'title',
    				//right: 'today,month,agendaWeek,prev,next'
            right: 'today,month,agendaWeek,prev,next'

			    },

          defaultView: 'agendaWeek',
          allDaySlot: false,
          locale:"es",
          firstDay:0,
          minTime: "09:00",
          maxTime: "16:00",
          slotDuration: '01:00:00',
          //axisFormat: 'hh:mm',
          timeFormat: 'hh:mm',
          slotLabelFormat:'(h:mm)a',
          //columnHeaderFormat: 'ddd',
          weekends:false,
          //hourNames:['12:00am','1:00am','2:00am','3:00am','4:00am','5:00am','6:00am','7:00am','8:00am','09:00am','10:00am','11:00am','12:00pm','1:00pm','2:00pm','3:00pm'],
          //allDay:false,
          monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          monthNameShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],

          dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes', 'Sabado'],
          dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
          events:[
            <?php
              while($fila=$res->fetch_assoc()){
                //echo $fila['nombre']." ".$fila['inicio']."<br>";
            ?>
          {
                id:"<?php echo $fila['id'];?>",
                title:"<?php echo $fila['nombre'];?>",
                start:"<?php echo $fila['inicio_d'].' '.$fila['inicio_h'];?>",
                end:"<?php echo $fila['fin_d'].' '.$fila['fin_h'];?>",
                url:"<?php echo $fila['url'];?>",
                className:"<?php echo $fila['className'];?>",
                editable:"<?php echo $fila['editable'];?>",  //los que tienen 1 si se pueden mover
                color: "<?php echo $fila['color'];?>"
          },
            <?php
              }
            ?>
          ],
          businessHours:[
          {

                // days of week. an array of zero-based day of week integers (0=Sunday)
              dow: [ 1, 2, 3, 4, 5], // Monday - Friday
              start: '9:00', // a start time
              end: '16:00', // an end time

          }
        ],

          /*dayClick: function(){
            $('#calendar').fullCalendar('changeView','agendaWeek');
          }
          */
          dayClick:
          function(date,event){
            $("#exampleModal").modal("show");
            $("#fecha").val(date.format('YYYY-MM-DD'));
            $("#inicio_h").val(event.format('(h:mm)a'));
            //$("lblNombre").val(event.id);
            /*(se abre php) $fechaClick="'"?>$("#fecha").val(date.format()) se cierra php*/

            //$("#inicio_h").timepicker();
            //$("#inicio_h").timepicker();
            //$("#nombre");
            //alert(date.format());
          },
          /*function(date, allDay, jsEvent, view) {
             var myDate = new Date();

             //How many days to add from today?
             var daysToAdd = 15;

             myDate.setDate(myDate.getDate() + daysToAdd);

             if (date < myDate) {
                 //TRUE Clicked date smaller than today + daysToadd
                 alert("You cannot book on this day!");
             } else {
                 //FLASE Clicked date larger than today + daysToadd
                 alert("Excellent choice! We can book today..");
             }

          },*/

          eventClick:
          /*    ESTO FUNCIONA     function(event) {
    alert(event.id); */
          function(event,jsEvent,view){
            $("#exampleModal2").modal("show");
            $("#txtId").val(event.id);
            $("#txtEncargado").val(event.title);
            $("#txtDia").val(event.start.format("YY/MM/DD"));
            $("#txtHi").val(event.start.format("hh:mm:ss"));
            $("#txtHf").val(event.end.format("hh:mm:ss"));
          }
        })

        /*function fIns(){

            query($insert);

        }*/

      });

    </script>
	</head>
  <body>

    <div class="row">
      <div class="col-md-6"> <!--Tienen que sumar 12-->
        <div id='calendar'></div>
      </div>
      <div class="col-md-6">
      </div>

    </div>

<!-- Modal FORM-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--<form class="" action="" method="post">-->
<form name="f1" method="post" action="registros.php">
      <div class="modal-body">
	  <table align="center">
		<tr>
			<td><label for="">Fecha: </label><br></td>
			<td><input type="text" id="fecha" name="fecha"/></br></td>
		</tr>
		<tr>
			<td><label for="">Nombre: </label><br></td>
			<td><input type="text" id="nombre" name="nombre"/></br></td>
		</tr>
		<tr>
			<td><label for="">Hora inicio: </label><br></td>
			<td><input type="time" id="inicio_h" name="inicio_h" min="09:00" max="15:00"/></br></td>
		</tr>
		<tr>
			<td><label for="">Hora Fin: </label><br></td>
			<td><input type="time" id="fin_h" name="fin_h"/></br></td>
		</tr>
		<tr>
			<td><label for="">Color: </label><br></td>
			<td><input type="color" id="color" name="color"/></br></td>
		</tr>
	  </table>
		<!--<div class="col-md-4">
			<label for="">Fecha: </label><br>
			<label for="">Nombre: </label><br>
			<label for="">Hora inicio: </label><br>
			<label for="">Hora Fin: </label><br>
			<label for="">Color: </label><br>
		</div>
		<div class="col-md-8">
			<input type="text" id="fecha" name="fecha"/></br><br>
			
			<input type="text" id="nombre" name="nombre"/></br><br>
			<!--<label for="">Inicio: </label>
			<input type="text" id="inicio_d" name="inicio_d"/></br>-->
		<!--	
			<input type="time" id="inicio_h" name="inicio_h" min="09:00" max="15:00"/></br><br>
			<!--<label for="">Fin: </label>
			<input type="text" id="fin_d" name="fin_d"/></br>-->
		<!--	
			<input type="time" id="fin_h" name="fin_h"/></br><br>
			
			<input type="color" id="color" name="color"/></br><br>
		</div>
		-->
      </div>
      <div class="modal-footer">
        <!--<input type="submit" value="aGENDAR" onclick="fIns()"/>-->
        <!--<button value="esto es un boton" onclick="fIns()"/>-->
        <!--<input type="button" value="Agendar" onclick="fIns()">Agendar</button>-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" value="Agendar"/>
        <!--
        <button type="button" class="btn btn-primary">Agendar</button>-->
      </div>
    </form>


    </div>
  </div>
</div> <!--Cierre de modal FORM-->
<!-- Modal ClickEvento-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cita agendada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
		<table align="center">
			<tr>
				<td>Id:<br></td>
				<td><input type="text" id="txtId" name="txtId" size="13" disabled/><br></td>
			</tr>
			<tr>
				<td>Encargado:<br></td>
				<td><input type="text" id="txtEncargado" name="txtEncargado" size="13"disabled/><br></td>
			</tr>
			<tr>
				<td>Dia:<br></td>
				<td><input type="text" id="txtDia" name="txtDia" size="13"disabled/><br></td>
			</tr>
			<tr>
				<td>Inicio:<br></td>
				<td><input type="text" id="txtHi" name="txtHi" size="13" disabled/><br></td>
			</tr>
			<tr>
				<td>Fin:<br></td>
				<td><input type="text" id="txtHf" name="txtHf" size="13" disabled/><br></td>
			</tr>
		</table>
        <!--Id: <input type="text" id="txtId" name="txtId" disabled/></br>
        Encargado: <input type="text" id="txtEncargado" name="txtEncargado" disabled/></br>
        Dia: <input type="text" id="txtDia" name="txtDia" disabled/></br>
        Inicio: <input type="text" id="txtHi" name="txtHi" disabled/></br>
        Fin: <input type="text" id="txtHf" name="txtHf" disabled/></br>
-->
      <?php
      /*  $clickEvento="SELECT * FROM citas";
        $resClick=$mysqli->query($clickEvento);
        $rC=mysqli_fetch_array($resClick);
        echo '
        <table border="2px">
          <tr>
            <td>Nombre: </td><td>'.$rC["nombre"].'</td>
          </tr>
          <tr>
            <td>Día: </td><td></td>
          </tr>
          <tr>
            <td>Horario: </td><td></td>
          </tr>
        </table>
        ';*/
      ?>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

 </html>
