<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Guru Online</title>
 	<meta name="viewport" content="width-device-width, initial-scale=1.0">
 	<link href="<?=site_url('assets/css/bootstrap.css')?>" rel="stylesheet">
 	<link href="<?=base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet" >
 	<link rel="stylesheet" href="<?=site_url('assets/css/style.css')?>">
 </head>
 <body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <div class="navbar-header">
        <h2><a href="<?=base_url('login')?>"><img src="<?=base_url('image/logo3.png')?>" width="150px" height="50px"></a></h2>
      </div>
      <ul class="nav navbar-nav navbar-right">
    
    <!--  <li class="nav-item active">
      <a class="nav-link" href="#"> Tentang Kami</a>
    </li> -->
        <li class="nav-item">
      <a class="nav-link" href="<?=base_url('login')?>"><span class="glyphicon glyphicon-log-in"></span> Masuk</a>
    </li>
        

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url('daftaradmin')?>"><span class="glyphicon glyphicon-book"></span> Daftar</a>
    </li>
    
   
  </ul>
  </div>
  
</nav>

<div class="container">
		<fieldset>
 		<legend>Login</legend>
 		<?php 

 		if (isset($gagal)) {
 			echo "<div class='alert alert-error'><strong>".$gagal."</strong></div>";
 			unset($gagal); 
 		}

 		 ?> 

 		 <form action="<?=base_url('login/cek_login')?>" class="form-inline" method="POST">
 		 	<input type="text" name="userid" class="input-small" placeholder="User ID" rel="tooltip" data-placement="top" title="Masukkan User ID Anda"><br><br>	
 		 	<input type="password" name="password" class="input-small" placeholder="Password" rel="tooltip" data-placement="top" title="Masukkan Password Anda"><br><br>
 		 	<button type="submit" name="login" class="btn btn-primary"><i class="icon-lock icon-white"></i>Login</button>
 		 </form>
 		 
 		 

 	</fieldset>
 	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<footer id="footer">
         <div class="container">
            <div class="hidden-xs">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <h2 class="logo logo-footer">GURU ONLINE</h2>
                        <p class="desc">
                            Mokhamad Nugroho Ardhi Syadzali
                            
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="link-title">COMPANY</p>
                         <ul>
                            <li>
                                <p>Terms &amp; Condition</p>
                            </li>
                            <li>
                                <p>Privacy Policy</p>
                            </li>
                            <li>
                                <p>Project Protection</p>
                            </li>
                            <li>
                                <p>FAQ</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="link-title">CONTACT US</p>
                        <ul>
                          <li>Nugik : 085646473651</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="link-title">RESOURCHES</p>
                       <ul>
                            <li>
                                <p>Blog</p>
                            </li>
                            <li>
                                <p>Advertisement</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </footer>
 
 </body>
 </html>