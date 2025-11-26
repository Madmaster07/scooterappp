<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    // Ruta directa a login de Admin
    $routes->connect('/login', [
        'prefix' => 'Admin',
        'controller' => 'Users',
        'action' => 'login'
    ]);

    
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'landing']);

    // Prefijo Admin
    $routes->prefix('Admin', function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    });

    
    $routes->scope('/', function (RouteBuilder $builder): void {

        
        $builder->connect('/profile', ['controller' => 'Users', 'action' => 'profile']);
        $builder->connect('/profile/edit', ['controller' => 'Users', 'action' => 'editProfile']);
        $builder->connect('/profile/password', ['controller' => 'Users', 'action' => 'changePassword']);

        // Rutas por defecto de Pages/display
        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });
};
