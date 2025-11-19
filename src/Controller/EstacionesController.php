<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estaciones Controller
 *
 */
class EstacionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Estaciones->find();
        $estaciones = $this->paginate($query);

        $this->set(compact('estaciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Estacione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estacione = $this->Estaciones->get($id, contain: []);
        $this->set(compact('estacione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estacione = $this->Estaciones->newEmptyEntity();
        if ($this->request->is('post')) {
            $estacione = $this->Estaciones->patchEntity($estacione, $this->request->getData());
            if ($this->Estaciones->save($estacione)) {
                $this->Flash->success(__('The estacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estacione could not be saved. Please, try again.'));
        }
        $this->set(compact('estacione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estacione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estacione = $this->Estaciones->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estacione = $this->Estaciones->patchEntity($estacione, $this->request->getData());
            if ($this->Estaciones->save($estacione)) {
                $this->Flash->success(__('The estacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estacione could not be saved. Please, try again.'));
        }
        $this->set(compact('estacione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estacione = $this->Estaciones->get($id);
        if ($this->Estaciones->delete($estacione)) {
            $this->Flash->success(__('The estacione has been deleted.'));
        } else {
            $this->Flash->error(__('The estacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
