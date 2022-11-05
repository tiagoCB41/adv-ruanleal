<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="dashboard.php" class="logo d-flex align-items-center">
    <img src="../assets/img/Ruan Leal Logo2 1.png" style="max-width: 150px; max-height: 70px;"  alt="">
    
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Pesquisar" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    

 

    <li style="margin-right: 30px;" class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="uploads/users/<?php echo $_SESSION['img']; ?>" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['login']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nome']; ?></h6>
              <span>
             
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Conta</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed " href="dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Inicio</span>
    </a>
  </li><!-- End Dashboard Nav -->

  

  <li class="nav-heading">Navegação</li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Noticias</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Artigos</span>
    </a>
  </li>
<li class="nav-item">
    <a class="nav-link collapsed" href="./form.php">
      <i class="bi bi-grid-3x3-gap"></i>
      <span>Formulario</span>
    </a>
  </li>
<hr>
  <li class="nav-item">
    <a class="nav-link collapsed" href="./logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Sair</span>
    </a>
  </li>
  
  <!-- End Login Page Nav -->
  
</ul>

</aside><!-- End Sidebar-->
