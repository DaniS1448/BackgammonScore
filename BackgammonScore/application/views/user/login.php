<div class="container">
	HOME APP BACKGAMMON
	<div>
		<h2>Login</h2>
		<form action="<?php echo base_url(); ?>/user/loginPost" method="post">
			<label for="username">Usuario: </label>
    		<input type="text" id="username" name="username">
    		<br>
    		<label for="pwd">Contraseña: </label>
    		<input type="password" id="pwd" name="pwd">
    		<br>
    		<button>Entrar</button>
    		<br>
    		<a href="<?= base_url(); ?>/user/register">Register</a>
		</form>
	</div>
</div>