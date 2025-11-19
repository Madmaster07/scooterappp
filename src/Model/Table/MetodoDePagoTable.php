<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MetodoDePago Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MetodoDePago newEmptyEntity()
 * @method \App\Model\Entity\MetodoDePago newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MetodoDePago> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MetodoDePago get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MetodoDePago findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MetodoDePago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MetodoDePago> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MetodoDePago|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MetodoDePago saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MetodoDePagoTable extends Table
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

        $this->setTable('metodo_de_pago');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('metodo')
            ->maxLength('metodo', 50)
            ->allowEmptyString('metodo');

        $validator
            ->scalar('numero_tarjeta')
            ->maxLength('numero_tarjeta', 20)
            ->allowEmptyString('numero_tarjeta');

        $validator
            ->date('fecha_vencimiento')
            ->allowEmptyDate('fecha_vencimiento');

        $validator
            ->scalar('cvv')
            ->maxLength('cvv', 10)
            ->allowEmptyString('cvv');

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

        return $rules;
    }
}
