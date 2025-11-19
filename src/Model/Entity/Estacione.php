<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estacione Entity
 *
 * @property int|null $id
 * @property string|null $nombre
 * @property string|null $direccion
 * @property string|null $latitud
 * @property string|null $longitud
 */
class Estacione extends Entity
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
        'nombre' => true,
        'direccion' => true,
        'latitud' => true,
        'longitud' => true,
    ];
}
