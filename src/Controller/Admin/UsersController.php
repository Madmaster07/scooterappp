<?php
namespace App\Controller\Admin;


use App\Controller\Admin\AppController; 
use Cake\Auth\DefaultPasswordHasher; 

class UsersController extends AppController
{
    
    public function index()
    {

        $users = $this->Users->find()
            ->where(['role' => 'admin']) 
            ->all();
            
        $this->set(compact('users'));
        $this->set('title', 'Gestión de Administradores');
    }

  
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            
            $user->role = 'admin'; 
            
            
            $user->password = (new DefaultPasswordHasher())->hash($this->request->getData('password'));

            if ($this->Users->save($user)) {
                $this->Flash->success(__('El nuevo administrador ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El administrador no pudo ser guardado. Intenta de nuevo.'));
        }
        
        $this->set(compact('user'));
    }

  
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']); 
        $user = $this->Users->get($id);
        
     
        if ($user->role !== 'admin' || $user->id === $this->Authentication->getIdentity()->get('id')) {
             $this->Flash->error(__('No tienes permiso para borrar a este usuario o no puedes borrarte a ti mismo.'));
             return $this->redirect(['action' => 'index']);
        }

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El administrador ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El administrador no pudo ser eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}