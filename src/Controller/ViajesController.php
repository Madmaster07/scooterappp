<?php
declare(strict_types=1);

namespace App\Controller;

class ViajesController extends AppController
{
    public function index()
    {
        $query = $this->Viajes->find();
        $viajes = $this->paginate($query);

        $this->set(compact('viajes'));
    }

    public function view($id = null)
    {
        $viaje = $this->Viajes->get($id, contain: []);
        $this->set(compact('viaje'));
    }

    public function add()
    {
        $viaje = $this->Viajes->newEmptyEntity();
        if ($this->request->is('post')) {
            $viaje = $this->Viajes->patchEntity($viaje, $this->request->getData());
            if ($this->Viajes->save($viaje)) {
                $this->Flash->success(__('El viaje ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el viaje. Intenta nuevamente.'));
        }
        $this->set(compact('viaje'));
    }

    public function edit($id = null)
    {
        $viaje = $this->Viajes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $viaje = $this->Viajes->patchEntity($viaje, $this->request->getData());
            if ($this->Viajes->save($viaje)) {
                $this->Flash->success(__('El viaje ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el viaje. Intenta nuevamente.'));
        }
        $this->set(compact('viaje'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $viaje = $this->Viajes->get($id);
        if ($this->Viajes->delete($viaje)) {
            $this->Flash->success(__('El viaje ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el viaje. Intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // NUEVA ACCIÓN: Historial de viajes del usuario logueado
    public function historial()
    {
        $user = $this->request->getAttribute('identity'); // Usuario logueado
        if (!$user) {
            $this->Flash->error(__('Debes iniciar sesión para ver tu historial.'));
            return $this->redirect('/users/login');
        }

        $query = $this->Viajes->find()
            ->where(['user_id' => $user->getIdentifier()])
            ->contain(['Vehiculos']) // si quieres traer info del vehículo
            ->order(['fecha_inicio' => 'DESC']);

        $viajes = $this->paginate($query);

        $this->set(compact('viajes'));
    }
}
