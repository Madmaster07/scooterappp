<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ViajesFixture
 */
class ViajesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'vehiculo_id' => 1,
                'estacion_id' => 1,
                'metodo_pago_id' => 1,
                'promocion_id' => 1,
                'fecha_inicio' => '2025-11-19 14:19:58',
                'fecha_fin' => '2025-11-19 14:19:58',
                'duracion_min' => 1,
                'costo_total' => 1.5,
                'estado' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
