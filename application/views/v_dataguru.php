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
    
      <?php
      if ((isset($page)) and ($page == 'tambah_guru')) { ?>
        
      
     
     <legend>Tambah Guru</legend>
     
      <?=form_open('dataguru/proses_tambah_guru', 'class="form-horizontal"') ?>
      <table>
        <tr><td>Nama Guru</td><td>: <input type="text" name="namateacher" placeholder="NamaLengkap" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>



        <tr><td>Pendidikan</td><td>: <input type="text" name="pendidikan" placeholder="Pendidikan" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        
        <tr><td>Jenjang</td><td>: <select name="id_jenjang"><option>SD</option><option>SMP</option><option>SMA</option></select></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Mata Pelajaran</td><td>: <select name="id_mapel"><option>MATEMATIKA</option><option>IPA</option><option>BAHASA INGGRIS</option><option>BAHASA INDONESIA</option><option>IPS</option></select> </td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Alamat</td><td>: <input type="text" name="alamat" placeholder="Alamat" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>No Telepon</td><td>: <input type="text" name="no_telp" placeholder="No Telepon" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Harga</td><td>: <input type="text" name="hargaperjam" placeholder="harga" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i>Simpan</button></td></tr>
      </table>  
     </form>
     

     <?php
     } elseif ((isset($page)) and ($page == 'ubah_guru')) { ?>
      <legend>Ubah Guru</legend>
      
      <?=form_open('dataguru/proses_ubah_guru', 'class="form-horizontal"') ?>
      <input type="hidden" name="id_teacher" value="<?=$guru->id_teacher?>">

      <table>
        <tr><td>Nama Guru</td><td>: <input type="text" name="namateacher" placeholder="NamaLengkap" value="<?=$guru->namateacher?>" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Pendidikan</td><td>: <input type="text" name="pendidikan" placeholder="Pendidikan" value="<?=$guru->pendidikan?>" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>

        
        <tr><td>Jenjang</td><td>: <select name="id_jenjang"><option value="<?=$guru->id_jenjang?>">SD</option><option>SMP</option><option>SMA</option></select></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Mata Pelajaran</td><td>: <select name="id_mapel"><option value="<?=$guru->id_mapel?>">MATEMATIKA</option><option>IPA</option><option>BAHASA INGGRIS</option><option>BAHASA INDONESIA</option><option>IPS</option></select> </td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Alamat</td><td>: <input type="text" name="alamat" placeholder="Alamat" value="<?=$guru->alamat?>" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>



        <tr><td>No Telepon</td><td>: <input type="text" name="no_telp" placeholder="No Telepon" value="<?=$guru->no_telp?>" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td>Harga</td><td>: <input type="text" name="hargaperjam" placeholder="harga" value="<?=$guru->hargaperjam?>" size="50"></td></tr>
        <tr><td><br></td><td><br></td></tr>


        <tr><td><button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i>Ubah</button></td></tr> 
      </table>  
     </form>
    <?php
    unset($guru);
     }elseif ((isset($page)) and ($page == 'daftar_guru')) { ?>
      <legend>Daftar Guru</legend>
      <!--PENCARIAN-->
      <table>
        <tr>
          <form action="<?=base_url('dataguru/daftar_guru')?>" class="form-horizontal" method="post" accept-charset="utf-8">
            <td><input type="text" name="cari" placeholder="Pencarian"/>
              <button type="submit" name="simpan" class="btn btn-primary"><i class="icon-search icon-white"></i>Cari</button>
              </td>
          </form>
          <td><a href="<?=base_url('dataguru/daftar_guru')?>">
             <button type="button" name="daftardata" class="btn btn-primary"><i class="icon-ok icon-white"></i>Semua Data</button>
          </a>
          </td>
          
        </tr>
        <tr>
          <td><br></td>
          <td><br></td>
        </tr>
      </table>
      <?php 

      if (!empty($cari)) {
        if ($jumlah>0) {
          echo "<div class='alert alert-success'>Ditemukan ".$jumlah." data</div>"; 
        }
        else {
          echo "<div class='alert alert-error'>Data Tidak Ditemukan</div>";
        }
      }

       ?>
      <table class="table table-bordered">
        <tr>
          <td width="10%"><center>ID</center></td>
          <td width="60%"><center>Nama</center></td>
          <td width="10%"><center>Pendidikan</center></td>
          <td width="60%"><center>Jenjang</center></td>
          <td width="10%"><center>Mapel</center></td>
          <td width="60%"><center>Alamat</center></td>
          <td width="60%"><center>No Telepon</center></td>
          <td width="60%"><center>Harga</center></td>
          <td colspan="2"><center>Aksi</center></td>
        </tr>
        <?php
          foreach ($daftar_guru as $r) {
            echo "<tr>
            <td>".$r->id_teacher."</td>
            <td>".$r->namateacher."</td>
            <td>".$r->pendidikan."</td>
            <td>".$r->id_jenjang."</td>
            <td>".$r->id_mapel."</td>
            <td>".$r->alamat."</td>
            <td>".$r->no_telp."</td>
            <td>".$r->hargaperjam."</td>
            <td><center><a href='".base_url('dataguru/ubah_guru/'.$r->id_teacher)."'><i class='icon-edit'></i>Ubah</a></center></td><td><center><a href='".base_url('dataguru/hapus_guru/'.$r->id_teacher)."' onCLick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i>Hapus</a></center></td></tr>";
          }
        ?>
      </table>

      <br/>
      <a href="<?=base_url('dataguru/tambah_guru')?>"><i class="icon-plus-sign"></i>Tambah Guru</a>

      <?php
      unset($daftar_guru, $r);
     }else{
      ?>
      <legend>Data Guru</legend>
      Hai <?=$this->session->userdata('nama')?>, selamat datang di Wesite Guru Online.<br/><br/>
      <a href="<?=base_url('dataguru/daftar_guru')?>"><i class="icon-hand-right"></i>Data guru</a>
   <!--    <a href="<?=base_url('dataguru/tambah_guru')?>"><i class="icon-hand-right"></i>Tambah guru</a>
      <a href="<?=base_url('dataguru/ubah_guru')?>"><i class="icon-hand-right"></i>Ubah guru</a> -->
     <?php
     }
     ?>
     <hr/>
     <a href="<?=base_url('Aplikasi')?>"><i class="icon-home"></i>Home</a> || <a href="<?=base_url('Aplikasi/logout')?>" onClick="return confirm('Apakah Anda Ingin logout?')"><i class="icon-off"></i>Logout</a>

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