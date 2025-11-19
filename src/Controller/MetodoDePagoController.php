<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MetodoDePago Controller
 *
 */
class MetodoDePagoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->MetodoDePago->find();
        $metodoDePago = $this->paginate($query);

        $this->set(compact('metodoDePago'));
    }

    /**
     * View method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metodoDePago = $this->MetodoDePago->get($id, contain: []);
        $this->set(compact('metodoDePago'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metodoDePago = $this->MetodoDePago->newEmptyEntity();
        if ($this->request->is('post')) {
            $metodoDePago = $this->MetodoDePago->patchEntity($metodoDePago, $this->request->getData());
            if ($this->MetodoDePago->save($metodoDePago)) {
                $this->Flash->success(__('The metodo de pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metodo de pago could not be saved. Please, try again.'));
        }
        $this->set(compact('metodoDePago'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metodoDePago = $this->MetodoDePago->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metodoDePago = $this->MetodoDePago->patchEntity($metodoDePago, $this->request->getData());
            if ($this->MetodoDePago->save($metodoDePago)) {
                $this->Flash->success(__('The metodo de pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metodo de pago could not be saved. Please, try again.'));
        }
        $this->set(compact('metodoDePago'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Metodo De Pago id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $metodoDePago = $this->MetodoDePago->get($id);
        if ($this->MetodoDePago->delete($metodoDePago)) {
            $this->Flash->success(__('The metodo de pago has been deleted.'));
        } else {
            $this->Flash->error(__('The metodo de pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
