<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MetodoDePagoFixture
 */
class MetodoDePagoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'metodo_de_pago';
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
                'metodo' => 'Lorem ipsum dolor sit amet',
                'numero_tarjeta' => 'Lorem ipsum dolor ',
                'fecha_vencimiento' => '2025-11-19',
                'cvv' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
