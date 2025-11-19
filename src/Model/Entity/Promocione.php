<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promocione Entity
 *
 * @property int|null $id
 * @property string|null $codigo
 * @property string|null $descripcion
 * @property string|null $porcentaje_descuento
 * @property \Cake\I18n\Date|null $fecha_inicio
 * @property \Cake\I18n\Date|null $fecha_fin
 */
class Promocione extends Entity
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
        'codigo' => true,
        'descripcion' => true,
        'porcentaje_descuento' => true,
        'fecha_inicio' => true,
        'fecha_fin' => true,
    ];
}
