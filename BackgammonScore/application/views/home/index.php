<div class="container mt-5">
		<br>
		<h4 class="text-uppercase text-center">Todos los partidos</h4>
		<div class="table-responsive">
		<table class="table table-sm stripe" id="tablaPuntos">
    		<thead>
        		<tr>
        			<th scope="col">Jugador 1</th>
        			<th scope="col">Jugador 2</th>
        			<th scope="col">Tipo</th>
        			<th scope="col">Fecha</th>
        			<th scope="col">Puntos</th>
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
			</tr>
		<?php endforeach;?>
		</tbody>
		</table>
		</div>
</div>
<script>
$(document).ready(function() {
    $('#tablaPuntos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>