<div class="container mt-5">
		<br>
		<div class="container">
			<div class="row d-fex justify-content-center">
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top Players</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Ganados</th>
                    			<th scope="col" class="text-success">G/P</th>
                    			<th scope="col">L/G</th>
                    			<th scope="col">LT/G</th>
                    			<th scope="col">M/G</th>
                    			<th scope="col">MT/G</th>
                    			<th scope="col" class="text-warning">L/P</th>
                    			<th scope="col" class="text-secondary">LT/P</th>
                    			<th scope="col" class="text-info">M/P</th>
                    			<th scope="col" class="text-primary">MT/P</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php foreach ($topusuarios as $usuario):?>
                				<tr>
                					<td><?= $ntop++ ?></td>
                					<td><?= $usuario['nombre']?></td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['ganados'] ?></td>
									<td class="text-success"><?= $usuario['gp'] ?>%</td>
									<td><?= $usuario['gl'] ?>%</td>
									<td><?= $usuario['glt'] ?>%</td>
									<td><?= $usuario['gm'] ?>%</td>
									<td><?= $usuario['gmt'] ?>%</td>
									<td class="text-warning"><?= $usuario['l'] ?>%</td>
									<td class="text-secondary"><?= $usuario['lt'] ?>%</td>
									<td class="text-info"><?= $usuario['m'] ?>%</td>
									<td class="text-primary"><?= $usuario['mt'] ?>%</td>
								</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
			
			
				<div class="col-auto">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top 5 Linie</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($toplinie as $top):?>
                				<tr>
                					<td><?= $ntop++; ?></td>
                					<td><?= $top['ganador'] ?></td>
                					<td><?= $top['puntos'] ?></td>
                					<td><?= $top['puntos'] ?></td>
                				</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				<div class="col-auto">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top 5 Linie Tehnica</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($toplinietehnica as $top):?>
                				<tr>
                					<td><?= $ntop++; ?></td>
                					<td><?= $top['ganador'] ?></td>
                					<td><?= $top['puntos'] ?></td>
                					<td><?= $top['puntos'] ?></td>
                				</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				<div class="col-auto">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top 5 Marti</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($topmarti as $top):?>
                				<tr>
                					<td><?= $ntop++; ?></td>
                					<td><?= $top['ganador'] ?></td>
                					<td><?= $top['puntos'] * 2 ?></td>
                					<td><?= $top['puntos'] ?></td>
                				</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				<div class="col-auto">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top 5 Marti Tehnic</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($topmartitehnic as $top):?>
                				<tr>
                					<td><?= $ntop++; ?></td>
                					<td><?= $top['ganador'] ?></td>
                					<td><?= $top['puntos'] * 2 ?></td>
                					<td><?= $top['puntos'] ?></td>
                				</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top Players % Linie</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col" class="text-warning">L/P</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Ganados</th>
                    			<th scope="col" class="text-success">G/P</th>
                    			<th scope="col">L/G</th>
                    			<th scope="col">LT/G</th>
                    			<th scope="col">M/G</th>
                    			<th scope="col">MT/G</th>
                    			<th scope="col" class="text-secondary">LT/P</th>
                    			<th scope="col" class="text-info">M/P</th>
                    			<th scope="col" class="text-primary">MT/P</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($lsuarios as $usuario):?>
                				<tr>
                					<td><?= $ntop++ ?></td>
                					<td><?= $usuario['nombre']?></td>
                					<td class="text-warning"><?= $usuario['l'] ?>%</td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['ganados'] ?></td>
									<td class="text-success"><?= $usuario['gp'] ?>%</td>
									<td><?= $usuario['gl'] ?>%</td>
									<td><?= $usuario['glt'] ?>%</td>
									<td><?= $usuario['gm'] ?>%</td>
									<td><?= $usuario['gmt'] ?>%</td>
									<td class="text-secondary"><?= $usuario['lt'] ?>%</td>
									<td class="text-info"><?= $usuario['m'] ?>%</td>
									<td class="text-primary"><?= $usuario['mt'] ?>%</td>
								</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top Players % Linie Tehnica</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col" class="text-secondary">LT/P</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Ganados</th>
                    			<th scope="col" class="text-success">G/P</th>
                    			<th scope="col">L/G</th>
                    			<th scope="col">LT/G</th>
                    			<th scope="col">M/G</th>
                    			<th scope="col">MT/G</th>
                    			<th scope="col" class="text-warning">L/P</th>
                    			<th scope="col" class="text-info">M/P</th>
                    			<th scope="col" class="text-primary">MT/P</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($ltsuarios as $usuario):?>
                				<tr>
                					<td><?= $ntop++ ?></td>
                					<td><?= $usuario['nombre']?></td>
                					<td class="text-secondary"><?= $usuario['lt'] ?>%</td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['ganados'] ?></td>
									<td class="text-success"><?= $usuario['gp'] ?>%</td>
									<td><?= $usuario['gl'] ?>%</td>
									<td><?= $usuario['glt'] ?>%</td>
									<td><?= $usuario['gm'] ?>%</td>
									<td><?= $usuario['gmt'] ?>%</td>
									<td class="text-warning"><?= $usuario['l'] ?>%</td>
									<td class="text-info"><?= $usuario['m'] ?>%</td>
									<td class="text-primary"><?= $usuario['mt'] ?>%</td>
								</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top Players % Marti</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col" class="text-info">M/P</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Ganados</th>
                    			<th scope="col" class="text-success">G/P</th>
                    			<th scope="col">L/G</th>
                    			<th scope="col">LT/G</th>
                    			<th scope="col">M/G</th>
                    			<th scope="col">MT/G</th>
                    			<th scope="col" class="text-warning">L/P</th>
                    			<th scope="col" class="text-secondary">LT/P</th>
                    			<th scope="col" class="text-primary">MT/P</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($msuarios as $usuario):?>
                				<tr>
                					<td><?= $ntop++ ?></td>
                					<td><?= $usuario['nombre']?></td>
                					<td class="text-info"><?= $usuario['m'] ?>%</td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['ganados'] ?></td>
									<td class="text-success"><?= $usuario['gp'] ?>%</td>
									<td><?= $usuario['gl'] ?>%</td>
									<td><?= $usuario['glt'] ?>%</td>
									<td><?= $usuario['gm'] ?>%</td>
									<td><?= $usuario['gmt'] ?>%</td>
									<td class="text-warning"><?= $usuario['l'] ?>%</td>
									<td class="text-secondary"><?= $usuario['lt'] ?>%</td>
									<td class="text-primary"><?= $usuario['mt'] ?>%</td>
								</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2">Top Players % Marti Tehnic</h3>
					<table class="table table-sm table-dark table-striped" id="toplinie">
                		<thead>
                    		<tr>
                    			<th scope="col">#</th>
                    			<th scope="col">Jugador</th>
                    			<th scope="col" class="text-primary">MT/P</th>
                    			<th scope="col">Puntos</th>
                    			<th scope="col">Partidos</th>
                    			<th scope="col">Ganados</th>
                    			<th scope="col" class="text-success">G/P</th>
                    			<th scope="col">L/G</th>
                    			<th scope="col">LT/G</th>
                    			<th scope="col">M/G</th>
                    			<th scope="col">MT/G</th>
                    			<th scope="col" class="text-warning">L/P</th>
                    			<th scope="col" class="text-secondary">LT/P</th>
                    			<th scope="col" class="text-info">M/P</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php $ntop=1; foreach ($mtsuarios as $usuario):?>
                				<tr>
                					<td><?= $ntop++ ?></td>
                					<td><?= $usuario['nombre']?></td>
                					<td class="text-primary"><?= $usuario['mt'] ?>%</td>
									<td><?= $usuario['puntos'] ?></td>
									<td><?= $usuario['partidos'] ?></td>
									<td><?= $usuario['ganados'] ?></td>
									<td class="text-success"><?= $usuario['gp'] ?>%</td>
									<td><?= $usuario['gl'] ?>%</td>
									<td><?= $usuario['glt'] ?>%</td>
									<td><?= $usuario['gm'] ?>%</td>
									<td><?= $usuario['gmt'] ?>%</td>
									<td class="text-warning"><?= $usuario['l'] ?>%</td>
									<td class="text-secondary"><?= $usuario['lt'] ?>%</td>
									<td class="text-info"><?= $usuario['m'] ?>%</td>
								</tr>
                			<?php endforeach;?>
                		</tbody>
            		</table>
				</div>
				
				
			</div>
		</div>
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