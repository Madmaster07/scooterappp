<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class PromocionesController extends AppController
{
    
    public function index()
    {
        $promociones = $this->paginate($this->Promociones); 
        
        $this->set(compact('promociones'));
        $this->set('title', 'Gestión de Promociones');
    }

    
    public function add()
    {
        $promocion = $this->Promociones->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $promocion = $this->Promociones->patchEntity($promocion, $this->request->getData());
            
            if ($this->Promociones->save($promocion)) {
                $this->Flash->success(__('La promoción ha sido creada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La promoción no pudo ser guardada. Revisa los datos.'));
        }
        
        $this->set(compact('promocion'));
    }

    
    public function edit($id = null)
    {
        $promocion = $this->Promociones->get($id, [
            'contain' => [],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promocion = $this->Promociones->patchEntity($promocion, $this->request->getData());
            
            if ($this->Promociones->save($promocion)) {
                $this->Flash->success(__('La promoción ha sido actualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La promoción no pudo ser actualizada.'));
        }
        
        $this->set(compact('promocion'));
    }

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']); 
        $promocion = $this->Promociones->get($id);
        
        if ($this->Promociones->delete($promocion)) {
            $this->Flash->success(__('La promoción con código {0} ha sido eliminada.', $promocion->codigo));
        } else {
            $this->Flash->error(__('La promoción no pudo ser eliminada.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}