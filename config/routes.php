<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    // Clase de ruta por defecto
    $routes->setRouteClass(DashedRoute::class);

    // Ruta directa a login de Admin
    $routes->connect('/login', [
        'prefix' => 'Admin',
        'controller' => 'Users',
        'action' => 'login'
    ]);

    // Prefijo Admin
    $routes->prefix('Admin', function (RouteBuilder $routes) {
        // Todas las rutas bajo /admin/* irán al prefijo Admin
        $routes->fallbacks(DashedRoute::class);
    });

    // Rutas normales
    $routes->scope('/', function (RouteBuilder $builder): void {
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/pages/*', 'Pages::display');
        $builder->fallbacks();
    });
};
