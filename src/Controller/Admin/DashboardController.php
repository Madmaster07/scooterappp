<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController; 
use Cake\I18n\FrozenTime; 

class DashboardController extends AppController
{
    
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Vehiculos');
        $this->loadModel('Viajes');
        $this->loadModel('Pagos');
    }

    public function index()
    {
        
        $totalVehiculos = $this->Vehiculos->find()->count();
        
        $disponibles = $this->Vehiculos->find()
            ->where(['estado' => 'Disponible'])
            ->count();
            
        $enUso = $this->Vehiculos->find()
            ->where(['estado' => 'En Viaje'])
            ->count();
            
        $mantenimiento = $this->Vehiculos->find()
            ->where(['estado' => 'Mantenimiento'])
            ->count();


        
        $hoy = FrozenTime::now()->startOfDay(); 

        $viajesHoy = $this->Viajes->find()
            
            ->where(['fecha_inicio >=' => $hoy]) 
            ->count();

        $viajesTotales = $this->Viajes->find()->count();


        
        $ingresosHoy = $this->Pagos->find()
            ->select(['total' => 'SUM(Pagos.monto)'])
            ->where([
                'fecha_pago >=' => $hoy,
                'estado_pago' => 'Completado' 
            ])
            ->first()
            ->total;
            
        
        if (is_null($ingresosHoy)) {
            $ingresosHoy = 0;
        }


        
        $this->set(compact(
            'totalVehiculos', 
            'disponibles', 
            'enUso', 
            'mantenimiento',
            'viajesHoy', 
            'viajesTotales',
            'ingresosHoy'
        ));
        
        $this->set('title', 'Dashboard Operacional');
    }
}