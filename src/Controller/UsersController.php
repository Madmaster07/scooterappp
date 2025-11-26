<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    //***********************************************************************//

    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','add']);
    }

    //***********************************************************************//

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Vehiculos',
                'action' => 'home',
            ]);

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    //***********************************************************************//

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    //***********************************************************************//

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect('/');
        }
    }

    //***********************************************************************//
    // PERFIL DE USUARIO
    //***********************************************************************//

    public function view()
    {
        $user = $this->Authentication->getIdentity();

        // Traer métodos de pago del usuario
        $pagos = $this->loadModel('MetodoDePago')->find()
            ->where(['user_id' => $user->id])
            ->all();

        $this->set(compact('user', 'pagos'));
    }

    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $userEntity = $this->Users->get($user->id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Users->patchEntity($userEntity, $this->request->getData());
            if ($this->Users->save($userEntity)) {
                $this->Flash->success(__('Perfil actualizado correctamente.'));
                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('Hubo un error al actualizar tu perfil.'));
        }

        $this->set(compact('userEntity'));
    }
}
