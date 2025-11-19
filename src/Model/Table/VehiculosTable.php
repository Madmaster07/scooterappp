<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiculos Model
 *
 * @property \App\Model\Table\ModelosTable&\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\ViajesTable&\Cake\ORM\Association\HasMany $Viajes
 *
 * @method \App\Model\Entity\Vehiculo newEmptyEntity()
 * @method \App\Model\Entity\Vehiculo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehiculo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Vehiculo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Vehiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Vehiculo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Vehiculo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Vehiculo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Vehiculo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VehiculosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vehiculos');

        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
        ]);
        $this->hasMany('Viajes', [
            'foreignKey' => 'vehiculo_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id');

        $validator
            ->integer('estacion_id')
            ->allowEmptyString('estacion_id');

        $validator
            ->integer('modelo_id')
            ->allowEmptyString('modelo_id');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 50)
            ->allowEmptyString('tipo');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 50)
            ->allowEmptyString('marca');

        $validator
            ->scalar('num_serie')
            ->maxLength('num_serie', 100)
            ->allowEmptyString('num_serie');

        $validator
            ->decimal('tarifa_minuto')
            ->allowEmptyString('tarifa_minuto');

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 50)
            ->allowEmptyString('estado');

        $validator
            ->integer('nivel_bateria')
            ->allowEmptyString('nivel_bateria');

        $validator
            ->decimal('latitud')
            ->allowEmptyString('latitud');

        $validator
            ->decimal('longitud')
            ->allowEmptyString('longitud');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'), ['errorField' => 'modelo_id']);

        return $rules;
    }
}
