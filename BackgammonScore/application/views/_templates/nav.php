<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark indigo sticky-top scrolling-navbar shadow-sm gradient">
<div class="container">
   <a class="navbar-brand d-flex align-items-center logo" href="<?= base_url(); ?>" style="font-family: 'Fredoka One', cursive;">
   	<img src="<?= base_url(); ?>assets/img/logo.png" width="10%" height="10%" alt="DaniS Logo">
   	Backgammon Score
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
         <?php if(isset($_SESSION['user'])):?>
         <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>user">User</a></li>
         <?php endif;?>
      </ul>
      <ul class="nav navbar-nav ml-auto nav-flex-icons">
      	
         
         <?php if(isset($_SESSION['user'])):?>
         <li><a class="nav-link" href="<?= base_url(); ?>user">Bienvenid@ <?= $_SESSION['user']->username ?></a></li>
         <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>user/logout">Logout</a></li>
         <?php else:?>
         <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>user/login">Login</a></li>
         <?php endif;?>
         
      </ul>
   </div>
</div>
</nav>
<!--/.Navbar -->