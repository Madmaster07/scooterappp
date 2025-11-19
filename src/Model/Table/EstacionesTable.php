<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estaciones Model
 *
 * @method \App\Model\Entity\Estacione newEmptyEntity()
 * @method \App\Model\Entity\Estacione newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Estacione> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estacione get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Estacione findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Estacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Estacione> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estacione|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Estacione saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Estacione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacione>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estacione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacione> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estacione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacione>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estacione>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacione> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EstacionesTable extends Table
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

        $this->setTable('estaciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->allowEmptyString('nombre');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->allowEmptyString('direccion');

        $validator
            ->decimal('latitud')
            ->allowEmptyString('latitud');

        $validator
            ->decimal('longitud')
            ->allowEmptyString('longitud');

        return $validator;
    }
}
