<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class PagosController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator'); // Necesario para $this->paginate()
        $this->loadComponent('Flash');     // Para mensajes de éxito/error
    }

    /**
     * Index: Lista todos los pagos
     */
    public function index()
    {
        $query = $this->Pagos->find()
            ->contain(['Viajes', 'MetodosPago'])
            ->order(['Pagos.fecha_pago' => 'DESC']);

        $pagos = $this->paginate($query);
        $this->set(compact('pagos'));
    }

    /**
     * View: Ver detalles de un pago
     */
    public function view($id = null)
    {
        $pago = $this->Pagos->get($id, [
            'contain' => ['Viajes', 'MetodosPago'],
        ]);
        $this->set(compact('pago'));
    }

    /**
     * Add: Crear un nuevo pago
     */
    public function add()
    {
        $pago = $this->Pagos->newEmptyEntity();
        if ($this->request->is('post')) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->getData());
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('El pago ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el pago. Intenta de nuevo.'));
        }

        $metodosPago = $this->Pagos->MetodosPago->find('list');
        $viajes = $this->Pagos->Viajes->find('list');
        $this->set(compact('pago', 'metodosPago', 'viajes'));
    }

    /**
     * Edit: Editar un pago existente
     */
    public function edit($id = null)
    {
        $pago = $this->Pagos->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->getData());
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('El pago ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el pago. Intenta de nuevo.'));
        }

        $metodosPago = $this->Pagos->MetodosPago->find('list');
        $viajes = $this->Pagos->Viajes->find('list');
        $this->set(compact('pago', 'metodosPago', 'viajes'));
    }

    /**
     * Delete: Eliminar un pago
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pago = $this->Pagos->get($id);
        if ($this->Pagos->delete($pago)) {
            $this->Flash->success(__('El pago ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el pago. Intenta de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Aplicar un código de descuento desde el home
     */
    public function aplicarCodigo()
    {
        if ($this->request->is('post')) {
            $codigo = $this->request->getData('codigo');

            $promocion = $this->Pagos->Promociones->find()
                ->where(['codigo' => $codigo, 'activo' => 1])
                ->first();

            if ($promocion) {
                $mensaje = "¡Código válido! Se aplicó un descuento de {$promocion->descuento}%";
                $mensajeColor = 'green';
                $this->request->getSession()->write('descuento', $promocion->descuento);
            } else {
                $mensaje = "Código inválido o expirado.";
                $mensajeColor = 'red';
            }

            $this->set(compact('mensaje', 'mensajeColor'));
        }
    }
}
