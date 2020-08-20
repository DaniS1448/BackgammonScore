<div class="container mt-5">
        <div class="row">
			<div class="col-md-5 mx-auto">

				<div class="myform form">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="<?php echo base_url(); ?>/user/loginPost" method="post">
                           <div class="form-group">
                              	<label for="username">Usuario: </label>
    							<input type="text" id="username" name="username" class="form-control" placeholder="Introduce el usuario">
    						</div>
                           <div class="form-group">
                             	<label for="pwd">Contraseña: </label>
    							<input type="password" id="pwd" name="pwd" class="form-control" placeholder="Introduce la contraseña">
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>

                           <div class="form-group mt-2">
                              <p class="text-center">¿No tienes cuenta? <a href="<?= base_url(); ?>/user/register" id="signup">Regístrate aquí</a></p>
                           </div>
                 </form>

				</div>

		</div>
      </div>
</div>