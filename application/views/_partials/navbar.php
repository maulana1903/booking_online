<header id="header" class="fixed-top header-transparent" style="background:#575757">
  <div class="container">
    <div class="row">
    <div class="col-8 col-lg-10"></div>
  </div>
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <h1 class="text-light"><a href="<?= base_url('') ?>"><img src="<?= base_url('assets/img/faviconn.png') ?>"><span>  </span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

<nav id="navbar" class="navbar"align="right">
        <ul style="background-color:black;">
          <li><a  href="<?= base_url('') ?>" style="color: white">Beranda</a></li>
          <li class="dropdown"><a href="#"><span style="color: white">Data</span> <i style="color: white" class="bi bi-chevron-down"></i></a>
            <ul>   
              <li><a href="<?= base_url('informasi/data_nama') ?>">NAMA</a></li>
              <li><a href="<?= base_url('informasi/data_nama_progdi') ?>">NAMA & PROGDI</a></li>
              <li><a href="<?= base_url('informasi/data_mahasiswa') ?>">MAHASISWA</a></li>
              <li><a href="<?= base_url('informasi/data_progdi') ?>">PROGDI</a></li>
            </ul>
           </li>
          <li class="dropdown"><a href="#"><span style="color: white">API SERVICE</span> <i style="color: white" class="bi bi-chevron-down"></i></a>
            <ul>                  
              <li><a href="<?= base_url('informasi/json_mahasiswa') ?>">MAHASISWA</a></li>
              <li><a href="<?= base_url('informasi/json_progdi') ?>">PROGDI</a></li>
            </ul>
           </li>       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i> 
      </nav><!-- .navbar -->
    </div>
  </header>