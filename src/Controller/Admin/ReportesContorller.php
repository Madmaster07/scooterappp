<?php

namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
class ReportesController extends AppController
{
    public function index()
    {
        
        $this->loadModel('Viajes');
        
        
        $query = $this->Viajes->find()
            ->contain(['Users', 'Vehiculos']) 
            ->order(['Viajes.fecha_inicio' => 'DESC']); 

        $viajes = $this->paginate($query); 
        
        $this->set(compact('viajes'));
        $this->set('title', 'Reporte de Viajes por Cliente');
    }
}

    public function ingresos()
    {
        $this->loadModel('Pagos');
        
                        $totalIngresos = $this->Pagos->find()
                            ->select(['total' => 'SUM(Pagos.monto)'])
                            ->where(['estado_pago' => 'Completado'])
                            ->first()
                            ->total;
            
                            $pagos = $this->Pagos->find()
                                ->contain(['Viajes']) 
                                ->where(['estado_pago' => 'Completado'])
                                ->order(['fecha_pago' => 'DESC']);

                            $pagos = $this->paginate($pagos);
                            
                            if (is_null($totalIngresos)) { $totalIngresos = 0; }

                            $this->set(compact('pagos', 'totalIngresos'));
                            $this->set('title', 'Reporte de Ingresos');
                        }