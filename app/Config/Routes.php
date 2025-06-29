<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
/**
 * @var RouteCollection $routes
 */
// Rutas públicas (sin filtro)
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::index');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('terminos', 'Home::terminos');
$routes->get('contactos', 'Home::contactos');
$routes->get('lavado_recomendado', 'Home::lavado_recomendado');
$routes->get('guia_talles', 'Home::guia_talles');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('preguntas_frecuentes', 'Home::preguntas_frecuentes');
$routes->get('perfil', 'Home::perfil');
$routes->get('facturas', 'Home::facturas');
$routes->get('verFacturas/(:num)', 'Admin::pedidos/$1');

// Rutas solo para administrador
$routes->get('admin', 'Admin::index', ['filter' => 'auth:admin']);
$routes->get('productos', 'Admin::productos', ['filter' => 'auth:admin']);
$routes->post('productos/crear', 'Admin::crear', ['filter' => 'auth:admin']);
$routes->get('pedidos', 'Admin::listarFacturas', ['filter' => 'auth:admin']);
$routes->get('pedidos/(:num)', 'Admin::pedidos/$1');
$routes->get('productos/eliminados', 'Admin::verEliminados', ['filter' => 'auth:admin']);
$routes->get('productos/activar/(:num)', 'Admin::activar/$1', ['filter' => 'auth:admin']);
$routes->get('productos/eliminar/(:num)', 'Admin::eliminar/$1', ['filter' => 'auth:admin']);
$routes->get('productos/editar/(:num)', 'Admin::editar/$1', ['filter' => 'auth:admin']);
$routes->post('productos/actualizar/(:num)', 'Admin::actualizar/$1', ['filter' => 'auth:admin']);
$routes->get('usuarios', 'Admin::usuariosRegistrados', ['filter' => 'auth:admin']);
$routes->post('createAdmin', 'Admin::createAdmin', ['filter' => 'auth:admin']);
$routes->get('consultas', 'Admin::consultas', ['filter' => 'auth:admin']);
$routes->get('marcarleido/(:segment)/(:num)', 'Admin::marcarLeido/$1/$2', ['filter' => 'auth:admin']);
$routes->get('desactivarUsuario/(:num)', 'Admin::desactivarUsuario/$1', ['filter' => 'auth:admin']);


// Rutas de autenticación y registro
$routes->get('login', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('logout', 'Login::logout');
$routes->get('register', 'Usuarios::index');
$routes->post('register', 'Usuarios::create');
$routes->post('consulta', 'Contacto::consulta');
$routes->get('mensaje', 'Usuarios::showMessage');


$routes->post('usuario/guardar_cambios', 'Usuarios::guardarCambios');
$routes->post('usuario/cambiar_password', 'Usuarios::cambiarPassword');

$routes->get('carrito/agregarCarrito/(:num)', 'Carrito::agregarCarrito/$1', ['filter' => 'auth:usuario']);
$routes->get('carrito', 'Carrito::ver', ['filter' => 'auth:usuario']);
$routes->post('guardarDireccion', 'Carrito::guardarDireccion');
$routes->get('carrito/eliminar/(:num)', 'Carrito::eliminar/$1', ['filter' => 'auth:usuario'] );
$routes->get('carrito/actualizar/(:num)/(:alpha)', 'Carrito::actualizar/$1/$2', ['filter' => 'auth:usuario']);
$routes->get('finalizarCompra', 'Carrito::finalizarCompra', ['filter' => 'auth:usuario']);
