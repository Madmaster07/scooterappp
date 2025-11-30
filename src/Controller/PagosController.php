<?php
declare(strict_types=1);

namespace App\Controller;

class PagosController extends AppController
{
    public function index()
    {
        $query = $this->Pagos->find();
        $pagos = $this->paginate($query);
        $this->set(compact('pagos'));
    }

    public function view($id = null)
    {
        $pago = $this->Pagos->get($id, contain: []);
        $this->set(compact('pago'));
    }

    public function add()
    {
        $pago = $this->Pagos->newEmptyEntity();
        if ($this->request->is('post')) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->getData());
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('El método de pago ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el método de pago. Por favor, intente de nuevo.'));
        }
        $this->set(compact('pago'));
    }

    public function edit($id = null)
    {
        $pago = $this->Pagos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->getData());
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('El método de pago ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el método de pago. Por favor, intente de nuevo.'));
        }
        $this->set(compact('pago'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pago = $this->Pagos->get($id);
        if ($this->Pagos->delete($pago)) {
            $this->Flash->success(__('El método de pago ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el método de pago. Por favor, intente de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // Acción para aplicar un código de descuento desde el home
    public function aplicarCodigo()
    {
        if ($this->request->is('post')) {
            $codigo = $this->request->getData('codigo');

            // Buscar promoción válida en la tabla Promociones
            $promocion = $this->Pagos->Promociones->find()
                ->where(['codigo' => $codigo, 'activo' => 1])
                ->first();

            if ($promocion) {
                $mensaje = "¡Código válido! Se aplicó un descuento de {$promocion->descuento}%";
                $mensajeColor = 'green';
                // Guardar el descuento en sesión para usarlo al pagar
                $this->request->getSession()->write('descuento', $promocion->descuento);
            } else {
                $mensaje = "Código inválido o expirado.";
                $mensajeColor = 'red';
            }

            $this->set(compact('mensaje', 'mensajeColor'));
        }
    }
}
