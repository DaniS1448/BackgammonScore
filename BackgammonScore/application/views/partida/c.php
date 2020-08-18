<div class="container">
	<form action="<?= base_url(); ?>partida/cPost" method="post">
		Ganador: 
		<input type="radio" name="ganador" value="Marian" id="idMarian" required/>
		<label for="idMarian">Marian</label>
		<input type="radio" name="ganador" value="Dani" id="idDani"/>
		<label for="idDani">Dani</label>
		<br>
		Puntos: 
		<input type="radio" name="puntos" value="1" id="idLinie" required/>
		<label for="idLinie">Linie</label>
		<input type="radio" name="puntos" value="2" id="idMarti"/>
		<label for="idMarti">Marti</label>
		<br>
		<input class="btn btn-dark" type="submit" value="Registrar" />
	</form>
</div>