<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Promociones Controller
 *
 * @property \App\Model\Table\PromocionesTable $Promociones
 */
class PromocionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Promociones->find();
        $promociones = $this->paginate($query);

        $this->set(compact('promociones'));
    }

    /**
     * View method
     *
     * @param string|null $id Promocione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promocione = $this->Promociones->get($id, contain: []);
        $this->set(compact('promocione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promocione = $this->Promociones->newEmptyEntity();
        if ($this->request->is('post')) {
            $promocione = $this->Promociones->patchEntity($promocione, $this->request->getData());
            if ($this->Promociones->save($promocione)) {
                $this->Flash->success(__('The promocione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promocione could not be saved. Please, try again.'));
        }
        $this->set(compact('promocione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promocione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promocione = $this->Promociones->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promocione = $this->Promociones->patchEntity($promocione, $this->request->getData());
            if ($this->Promociones->save($promocione)) {
                $this->Flash->success(__('The promocione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promocione could not be saved. Please, try again.'));
        }
        $this->set(compact('promocione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promocione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promocione = $this->Promociones->get($id);
        if ($this->Promociones->delete($promocione)) {
            $this->Flash->success(__('The promocione has been deleted.'));
        } else {
            $this->Flash->error(__('The promocione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
