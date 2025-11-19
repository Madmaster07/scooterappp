<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Viaje Entity
 *
 * @property int|null $id
 * @property int|null $user_id
 * @property int|null $vehiculo_id
 * @property int|null $estacion_id
 * @property int|null $metodo_pago_id
 * @property int|null $promocion_id
 * @property \Cake\I18n\DateTime|null $fecha_inicio
 * @property \Cake\I18n\DateTime|null $fecha_fin
 * @property int|null $duracion_min
 * @property string|null $costo_total
 * @property string|null $estado
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vehiculo $vehiculo
 * @property \App\Model\Entity\Pago[] $pagos
 */
class Viaje extends Entity
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
        'user_id' => true,
        'vehiculo_id' => true,
        'estacion_id' => true,
        'metodo_pago_id' => true,
        'promocion_id' => true,
        'fecha_inicio' => true,
        'fecha_fin' => true,
        'duracion_min' => true,
        'costo_total' => true,
        'estado' => true,
        'user' => true,
        'vehiculo' => true,
        'pagos' => true,
    ];
}
