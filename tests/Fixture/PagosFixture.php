<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PagosFixture
 */
class PagosFixture extends TestFixture
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
                'viaje_id' => 1,
                'metodo_pago_id' => 1,
                'monto' => 1.5,
                'fecha_pago' => '2025-11-19 14:19:51',
                'estado_pago' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
