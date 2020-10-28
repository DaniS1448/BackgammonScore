<div class="container mt-5">
		<br>
		<div class="container">
		
			<div class="row d-fex justify-content-center">
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-primary text-white m-0 p-2 rounded">Último día <?= $lastday; ?></h3>
					
					<table class="table table-sm table-primary table-striped rounded" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Linie</th>
                    			<th scope="col">Marti</th>
                    			<th scope="col">MartiT</th>
                    			<th scope="col">LinieT</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php foreach ($jugadoresld as $usuario):?>
                				<tr>
                					<td><?= $ntopday++ ?></td>
                					<td><?= $usuario['nombre']?></td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['l'] ?></td>
									<td><?= $usuario['m'] ?></td>
									<td><?= $usuario['mt'] ?></td>
									<td><?= $usuario['lt'] ?></td>
                				</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
			
			</div>
		
			<div class="d-flex justify-content-center my-4">
    			<form action="<?php echo base_url(); ?>home/duel" method="get">
        		<div class="form-row">
        			<div class="form-group col-auto">
                		<select class="form-control" id="oponente" name="jugador1" onchange="actGanador();">
                			<?php foreach ($users as $user):?>
                				<option value="<?= $user->id ?>"><?= $user->username ?></option>
                			<?php endforeach;?>
                		</select>
        			</div>
        			
        			<div class="form-group col-auto">
        				<button type="submit" class="btn btn-primary">Duel</button>
        			</div>
        			
        			<div class="form-group col-auto">
                		<select class="form-control" id="ganador" name="jugador2">
                			<?php foreach ($users as $user):?>
                				<option value="<?= $user->id ?>"><?= $user->username ?></option>
                			<?php endforeach;?>
                		</select>
        			</div>
        			
        		</div>
        		</form>
    		</div>
		
			<div class="row d-fex justify-content-center">
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2 rounded">Top Players</h3>
					<table class="table table-sm table-dark table-striped rounded" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Ganados</th>
                    			<th scope="col" class="text-success">G/P</th>
                    			<th scope="col" class="text-warning">L/P</th>
                    			<th scope="col" class="text-secondary">LT/P</th>
                    			<th scope="col" class="text-info">M/P</th>
                    			<th scope="col" class="text-primary">MT/P</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php foreach ($usuarios as $usuario):?>
                				<tr>
                					<td><?= $ntop++ ?></td>
                					<td><?= $usuario['nombre']?></td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['ganados'] ?></td>
									<td class="text-success"><?= $usuario['gp'] ?>%</td>
									<td class="text-warning"><?= $usuario['l'] ?>%</td>
									<td class="text-secondary"><?= $usuario['lt'] ?>%</td>
									<td class="text-info"><?= $usuario['m'] ?>%</td>
									<td class="text-primary"><?= $usuario['mt'] ?>%</td>
                				</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
			
			</div>
		</div>
		

		
		<h4 class="text-uppercase text-center mt-4">Todos los partidos</h4>
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