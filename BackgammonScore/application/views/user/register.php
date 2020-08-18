<div class="container">
	HOME APP BACKGAMMON
	<div>
		<h2>Register</h2>
		<form action="<?php echo base_url(); ?>/user/registerPost" method="post">
			<label for="username">Usuario: </label>
    		<input type="text" id="username" name="username">
    		<br>
    		<label for="pwd">Contraseña: </label>
    		<input type="password" id="pwd" name="pwd">
    		<br>
    		<button>Crear cuenta</button>
    		<br>
    		<a href="<?= base_url(); ?>/user/login">Login</a>
		</form>
	</div>
</div>