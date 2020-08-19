<script>
function actGanador(){
	

	arrayGanador = document.getElementById("ganador").options;
	arrayOponente = document.getElementById("oponente").options;

	arrayGanador[arrayGanador.length-1]=null;
	for(var opcion of arrayOponente){
		if(opcion.selected){
			arrayGanador[arrayGanador.length] = new Option(opcion.text, opcion.value, '', '');
		}
	}
}

function addPartido(){
	var datos="idOponente="+document.getElementById("oponente").value;
	datos+="&idGanador="+document.getElementById("ganador").value;
	datos+="&tipo="+document.getElementById("tipo").value;
	
	var x = new XMLHttpRequest();

	x.open("POST", "partido/ajaxCPost", true);
	x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	x.setRequestHeader("X-Requested-With","XMLHttpRequest");
	x.send(datos);
	
	x.onreadystatechange=function(){
		if(x.readyState == 4 && x.status==200){
			var respuesta = JSON.parse(x.responseText);
			
			if(respuesta.estado == true){
				mostrarModalError("info", respuesta.mensaje);
				var j1 = document.getElementById("ganador").getElementsByTagName("option")[0].innerHTML;
				var j2 = document.getElementById("ganador").getElementsByTagName("option")[1].innerHTML;
				if (document.getElementById("ganador").getElementsByTagName("option")[0].selected){
					j1 = '<td class="font-weight-bold text-primary">'+j1+'</td>';
					j2 = '<td>'+j2+'</td>';
				} else {
					j1 = '<td>'+j1+'</td>';
					j2 = '<td class="font-weight-bold text-primary">'+j2+'</td>';
				}

				var tipo = document.getElementById("tipo");
				var opcionTipo = tipo.options[tipo.selectedIndex].text.split(" (")[0];
				var date = new Date(); // Or the date you'd like converted.
				var isoDateTime = new Date(date.getTime() - (date.getTimezoneOffset() * 60000)).toISOString();
				var fecha=isoDateTime.toString("yyyyMMddHHmmss").replace(/T/, ' ').replace(/\..+/, '');
				var puntos = tipo.options[tipo.selectedIndex].text.split(" (")[1].split('')[0]+'p';
				
				var nuevoTr='<tr role="row" class="odd">'+j1+''+j2+'<td class="text-nowrap">'+opcionTipo+'</td><td class="text-nowrap sorting_1">'+fecha+'</td><td>'+puntos+'</td><td><i class="fas fa-trash-alt"></i></td></tr>';
				$("#tablaPuntos").find("tbody").prepend(nuevoTr);
			} else {
				mostrarModalError("warning", respuesta.mensaje);
			}
		}
	}
}

function mostrarModalError(tipo = "warning", mensaje="No hay mensajes", volver=""){
	
	var cabecera = $('#modalErrores').find('.modal-header');
	var titulo = $('#modalErrores').find('.modal-header p');
	var icono = $('#modalErrores').find('.modal-body .text-center i');
	var pmensaje = $('#modalErrores').find('.modal-body .text-center p');
	var btnCerrar = $('#modalErrores').find("a[data-dismiss='modal']");
	var btnVolver = $('#modalErrores').find("a[type='button']:first");
	var btnVolverColor ="";
	
	titulo.removeClass().addClass("modal-title text-white").text("AVISO");
	pmensaje.text(mensaje);
	
	
	if(tipo=="light" || tipo=="white"){
		cabecera.removeClass().addClass("modal-header bg-dark");
		icono.removeClass().addClass("fas fa-4x mb-3 animated rotateIn"+" text-dark");
		btnVolverColor = "dark";
		btnCerrar.removeClass().addClass("btn btn-outline-dark waves-effect");
	} else {
		cabecera.removeClass().addClass("modal-header bg-"+tipo);
		icono.removeClass().addClass("fas fa-4x mb-3 animated rotateIn"+" text-"+tipo);
		btnVolverColor = tipo;
		btnCerrar.removeClass().addClass("btn btn-outline-"+tipo+" waves-effect");
	}
	
	
	if(volver !== ""){
		btnVolver.removeClass().addClass("btn d-block btn-"+btnVolverColor).attr("href", volver);
	} else {
		btnVolver.removeClass().addClass("btn d-none");
	}
	
	//fas fa-check fa-4x mb-3 animated rotateIn text-danger
	
	if(tipo=="success"){icono.addClass("fas fa-check-circle");}
	else if(tipo=="warning"){icono.addClass("fas fa-exclamation-circle");titulo.text("ATENCIÓN");}
	else if(tipo=="danger"){icono.addClass("fas fa-exclamation-circle");titulo.text("ERROR");}
	else {icono.addClass("fa-info-circle");}
	
	$('#modalErrores').modal();
}
</script>

<div class="container mt-5">
	<?php if(isset($_SESSION['user'])):?>
	<div>
		<h4 class="text-uppercase text-center">Añadir partido</h4>
		<form action="<?php echo base_url(); ?>partido/cPost" method="post">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="oponente">Oponente: </label>
        		<select class="form-control" id="oponente" name="idOponente" onchange="actGanador();">
        			<?php foreach ($users as $user):?>
        				<?php if($_SESSION['user'] != $user):?>
            				<option value="<?= $user->id ?>"><?= $user->username ?></option>	
            			<?php endif;?>
        			<?php endforeach;?>
        		</select>
			</div>
			<div class="form-group col-md-3">
				<label for="ganador">Ganador: </label>
        		<select class="form-control" id="ganador" name="idGanador">
        			<option value="<?= $_SESSION['user']->id ?>"><?= $_SESSION['user']->username ?></option>
        			<option value="<?= $_SESSION['user']->id ?>"><?= $_SESSION['user']->username ?></option>
        		</select>
        		<script>actGanador();</script>
			</div>
			<div class="form-group col-md-3">
				<label for="tipo">Tipo: </label>
        		<select class="form-control" id="tipo" name="tipo">
        			<option value="0">Linie (1p)</option>
        			<option value="1">Linie tehnica (1p)</option>
        			<option value="2">Marti (2p)</option>
        			<option value="3">Marti tehnic (2p)</option>
        		</select>
			</div>
			<div class="form-group col-md-3 d-flex justify-content-center align-items-center">
				<button type="button" class="btn btn-primary" onclick="addPartido();">Añadir</button>
			</div>
		</div>
		</form>
		
		
		<br>
		<h4 class="text-uppercase text-center">Partidos de <?= $_SESSION['user']->username ?></h4>
		<div class="table-responsive">
		<table class="table table-sm stripe" id="tablaPuntos">
    		<thead>
        		<tr>
        			<th scope="col">Jugador 1</th>
        			<th scope="col">Jugador 2</th>
        			<th scope="col">Tipo</th>
        			<th scope="col">Fecha</th>
        			<th scope="col">Puntos</th>
        			<th scope="col">Ac.</th>
        		</tr>
    		</thead>
    		<tbody>
		<?php foreach ($partidos as $partido):?>
			<tr>
				<td <?= $partido->ganador == $partido->jugador1?'class="font-weight-bold text-primary"':'' ?>><?= $partido->jugador1->username ?></td>
				<td <?= $partido->ganador == $partido->jugador2?'class="font-weight-bold text-primary"':'' ?>><?= $partido->jugador2->username ?></td>
				<td class="text-nowrap"><?php 
				    if($partido->tipo == '0'){
    				    echo "Linie";
				    } else if($partido->tipo == '1'){
				        echo "Linie tehnica";
				    } else if($partido->tipo == '2'){
				        echo "Marti";
				    } else if($partido->tipo == '3'){
				        echo "Marti tehnic";
				    }
				?></td>
				<td class="text-nowrap"><?= $partido->date ?></td>
				<td><?php 
				    if($partido->tipo == '0'){
    				    echo "1p";
				    } else if($partido->tipo == '1'){
				        echo "1p";
				    } else if($partido->tipo == '2'){
				        echo "2p";
				    } else if($partido->tipo == '3'){
				        echo "2p";
				    }
				?></td>
				<td>
					<a href='partido/delete?idPartido=<?= $partido->id; ?>' title='Eliminar Partido' data-toggle='tooltip'>
                    	<i class="fas fa-trash-alt"></i>
                    </a>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
		</table>
		</div>
	</div>
	<?php endif;?>
</div>
<script>
$(document).ready(function() {
    $('#tablaPuntos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>

<!-- INICIO Central Modal Medium Errores -->
 <div class="modal fade" id="modalErrores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header bg-info">
         <p class="modal-title text-white">AVISO</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>No hay mensajes</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
       	 <a type="button" class="btn btn-info d-none" href="./"><i class="fas fa-angle-left"></i> Volver</a>
         <a type="button" class="btn btn-outline-info" data-dismiss="modal">Cerrar</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- FIN Central Modal Medium Errores-->