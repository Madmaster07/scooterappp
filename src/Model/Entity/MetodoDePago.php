<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MetodoDePago Entity
 *
 * @property int|null $id
 * @property int|null $user_id
 * @property string|null $metodo
 * @property string|null $numero_tarjeta
 * @property \Cake\I18n\Date|null $fecha_vencimiento
 * @property string|null $cvv
 *
 * @property \App\Model\Entity\User $user
 */
class MetodoDePago extends Entity
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
        'metodo' => true,
        'numero_tarjeta' => true,
        'fecha_vencimiento' => true,
        'cvv' => true,
        'user' => true,
    ];
}
