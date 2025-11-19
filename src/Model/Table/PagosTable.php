<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pagos Model
 *
 * @property \App\Model\Table\ViajesTable&\Cake\ORM\Association\BelongsTo $Viajes
 *
 * @method \App\Model\Entity\Pago newEmptyEntity()
 * @method \App\Model\Entity\Pago newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pago> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pago get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pago findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pago> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pago|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pago saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pago>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pago> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pago>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pago> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PagosTable extends Table
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

        $this->setTable('pagos');

        $this->belongsTo('Viajes', [
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
            ->integer('viaje_id')
            ->allowEmptyString('viaje_id');

        $validator
            ->integer('metodo_pago_id')
            ->allowEmptyString('metodo_pago_id');

        $validator
            ->decimal('monto')
            ->allowEmptyString('monto');

        $validator
            ->dateTime('fecha_pago')
            ->allowEmptyDateTime('fecha_pago');

        $validator
            ->scalar('estado_pago')
            ->maxLength('estado_pago', 50)
            ->allowEmptyString('estado_pago');

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
        $rules->add($rules->existsIn(['viaje_id'], 'Viajes'), ['errorField' => 'viaje_id']);

        return $rules;
    }
}
