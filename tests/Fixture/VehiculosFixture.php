<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VehiculosFixture
 */
class VehiculosFixture extends TestFixture
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
                'estacion_id' => 1,
                'modelo_id' => 1,
                'tipo' => 'Lorem ipsum dolor sit amet',
                'marca' => 'Lorem ipsum dolor sit amet',
                'num_serie' => 'Lorem ipsum dolor sit amet',
                'tarifa_minuto' => 1.5,
                'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'estado' => 'Lorem ipsum dolor sit amet',
                'nivel_bateria' => 1,
                'latitud' => 1.5,
                'longitud' => 1.5,
            ],
        ];
        parent::init();
    }
}
