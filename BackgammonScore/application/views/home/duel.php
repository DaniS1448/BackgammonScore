<div class="container mt-5">
		<br>
		<div class="container">
			<div class="row d-fex justify-content-center">
				<div class="col-12 table-responsive">
					<h3 class="text-center bg-dark text-white m-0 p-2 rounded">Duel <span class="text-danger"><?= $topusuarios[0]['nombre'] ?></span> VS <span class="text-danger"><?= $topusuarios[1]['nombre'] ?></span></h3>
					<table class="table table-sm table-dark table-striped rounded" id="toplinie">
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
                			<?php $ntop=1; foreach ($topusuarios as $usuario):?>
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
					<h3 class="text-center bg-dark text-white m-0 p-2 rounded">Linie</h3>
					<table class="table table-sm table-dark table-striped rounded" id="toplinie">
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
					<h3 class="text-center bg-dark text-white m-0 p-2 rounded">Linie Tehnica</h3>
					<table class="table table-sm table-dark table-striped rounded" id="toplinietehnica">
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
					<h3 class="text-center bg-dark text-white m-0 p-2 rounded">Marti</h3>
					<table class="table table-sm table-dark table-striped rounded" id="topmarti">
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
					<h3 class="text-center bg-dark text-white m-0 p-2 rounded">Marti Tehnic</h3>
					<table class="table table-sm table-dark table-striped rounded" id="topmartitehnic">
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
				
				
			</div>
		</div>
		
</div>