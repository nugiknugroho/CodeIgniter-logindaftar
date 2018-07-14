<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
	


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
        <h2><a href="<?=base_url('Aplikasi')?>"><img src="<?=base_url('image/logo3.png')?>" width="150px" height="50px"></a></h2>
      </div>
      <ul class="nav navbar-nav navbar-right">
    
    <!--  <li class="nav-item active">
      <a class="nav-link" href="#"> Tentang Kami</a>
    </li> -->
          <li class="nav-item">
      <a class="nav-link" href="<?=base_url('Aplikasi/logout')?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="<?=base_url('dataguru')?>"><span class="glyphicon glyphicon-book"></span> Data guru</a>
    </li>
        

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url('pesanguru')?>"><span class="glyphicon glyphicon-book"></span> Pesan Sekarang</a>
    </li>
    
   
  </ul>
  </div>
  
</nav>

<div class="container">
		<fieldset>
 		<legend>Menu Utama</legend>
 		
 		 	
 		 	Hai <?=$this->session->userdata('nama')?>, selamat datang di Website Guru Online.<br/><br/>
 		 	
 		<!--  <hr/>
 		 <a href="<?=base_url('Aplikasi')?>"><i class="icon-home"></i>Home</a> || <a href="<?=base_url('Aplikasi/logout')?>" onClick="return confirm('Apakah Anda Ingin logout?')"><i class="icon-off"></i>Logout</a>
 -->
 		 <?unset($page);
 		 ?>

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
 <?php } ?>