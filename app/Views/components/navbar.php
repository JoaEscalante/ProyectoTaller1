<?php
use App\Models\ItemCarritoModel;

$session = session();
$carritoModel = new ItemCarritoModel();
$estadoCarrito = $carritoModel->consultarCarrito();
$carrito_con_items = $estadoCarrito['carrito_con_items'] ?? false;
?>


<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">

    <!-- Logo y nombre de la marca -->
    <a class="navbar-brand" href="<?= base_url('inicio') ?>">
      <img src="<?= base_url('public/assets/img/LogoRetromaniacos.png') ?>" alt="Logo">
      RetroManiacos
    </a>

    <!-- Botón hamburguesa para pantallas pequeñas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú colapsable -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-lg-0">

        <!-- Menú de navegación principal -->
        <!-- Catalogo -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= base_url('catalogo') ?>">Catálogo</a>
        </li>
       

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('quienes_somos') ?>">¿Quiénes Somos?</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('comercializacion') ?>">Comercialización</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contactos') ?>">Contactos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('terminos') ?>">Términos</a>
        </li>
      </ul>

      <!-- Sección de búsqueda e iconos-->
      <form class="formulario" role="search" action="catalogo" method="GET">
          <input class="form-control" type="search" name="q" placeholder="Buscar..." aria-label="Buscar" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
          <button class="btn-icon" type="submit"> <i class="bi bi-search"></i></button>

       
        
        <?php if (!$session->get('login_in')): ?>
        <!-- Usuario no logueado: mostrar botón para iniciar sesión -->
        <a href="<?= base_url('login') ?>" class="btn-icon btn-outline-primary"><i class="bi bi-person-circle"></i></a>
        <?php else: ?>
            <!-- Usuario logueado: mostrar menú desplegable -->
            <div class="dropdown">
                <button class="btn-icon btn-outline-primary dropdown-toggle" type="button" id="perfilDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </button>
                <ul class="dropdown-menu me-5" aria-labelledby="perfilDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('perfil') ?>">Tu perfil</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('facturas') ?>">Facturas</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">Cerrar sesión</a></li>
                </ul>
            </div>
            <!-- Botón del carrito -->
          <a href="<?= base_url('carrito') ?>" class="btn-icon btn-outline-primary position-relative">
            <i class="bi bi-cart"></i>
            <?php if ($carrito_con_items): ?>
                <span class="circulo-carrito position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">Productos en el carrito</span>
                </span>
            <?php endif; ?>
        </a>


        <?php endif; ?>
      </form>
      
     
    </div>
  </div>
</nav>
