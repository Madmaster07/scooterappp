<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pago Entity
 *
 * @property int|null $id
 * @property int|null $viaje_id
 * @property int|null $metodo_pago_id
 * @property string|null $monto
 * @property \Cake\I18n\DateTime|null $fecha_pago
 * @property string|null $estado_pago
 *
 * @property \App\Model\Entity\Viaje $viaje
 */
class Pago extends Entity
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
        'viaje_id' => true,
        'metodo_pago_id' => true,
        'monto' => true,
        'fecha_pago' => true,
        'estado_pago' => true,
        'viaje' => true,
    ];
}
