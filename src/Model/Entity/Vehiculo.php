<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiculo Entity
 *
 * @property int|null $id
 * @property int|null $estacion_id
 * @property int|null $modelo_id
 * @property string|null $tipo
 * @property string|null $marca
 * @property string|null $num_serie
 * @property string|null $tarifa_minuto
 * @property string|null $descripcion
 * @property string|null $estado
 * @property int|null $nivel_bateria
 * @property string|null $latitud
 * @property string|null $longitud
 *
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Viaje[] $viajes
 */
class Vehiculo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'id' => true,
        'estacion_id' => true,
        'modelo_id' => true,
        'tipo' => true,
        'marca' => true,
        'num_serie' => true,
        'tarifa_minuto' => true,
        'descripcion' => true,
        'estado' => true,
        'nivel_bateria' => true,
        'latitud' => true,
        'longitud' => true,
        'modelo' => true,
        'viajes' => true,
    ];
}
