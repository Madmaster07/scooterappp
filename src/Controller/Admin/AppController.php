<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class AppController extends AppController
{
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        
        $usuario = $this->request->getAttribute('identity');

        
        if ($usuario && $usuario->rol === 'admin') {
            
            return; 
        }

        
        throw new \Cake\Http\Exception\ForbiddenException('Suerte para la proxima solo admins');
    }
}