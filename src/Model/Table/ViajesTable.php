<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Viajes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\VehiculosTable&\Cake\ORM\Association\BelongsTo $Vehiculos
 * @property \App\Model\Table\PagosTable&\Cake\ORM\Association\HasMany $Pagos
 *
 * @method \App\Model\Entity\Viaje newEmptyEntity()
 * @method \App\Model\Entity\Viaje newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Viaje> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Viaje get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Viaje findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Viaje patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Viaje> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Viaje|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Viaje saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ViajesTable extends Table
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

        $this->setTable('viajes');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Vehiculos', [
            'foreignKey' => 'vehiculo_id',
        ]);
        $this->hasMany('Pagos', [
            'foreignKey' => 'viaje_id',
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
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('vehiculo_id')
            ->allowEmptyString('vehiculo_id');

        $validator
            ->integer('estacion_id')
            ->allowEmptyString('estacion_id');

        $validator
            ->integer('metodo_pago_id')
            ->allowEmptyString('metodo_pago_id');

        $validator
            ->integer('promocion_id')
            ->allowEmptyString('promocion_id');

        $validator
            ->dateTime('fecha_inicio')
            ->allowEmptyDateTime('fecha_inicio');

        $validator
            ->dateTime('fecha_fin')
            ->allowEmptyDateTime('fecha_fin');

        $validator
            ->integer('duracion_min')
            ->allowEmptyString('duracion_min');

        $validator
            ->decimal('costo_total')
            ->allowEmptyString('costo_total');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 50)
            ->allowEmptyString('estado');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['vehiculo_id'], 'Vehiculos'), ['errorField' => 'vehiculo_id']);

        return $rules;
    }
}
