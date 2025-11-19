<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetodoDePagoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetodoDePagoTable Test Case
 */
class MetodoDePagoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MetodoDePagoTable
     */
    protected $MetodoDePago;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.MetodoDePago',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MetodoDePago') ? [] : ['className' => MetodoDePagoTable::class];
        $this->MetodoDePago = $this->getTableLocator()->get('MetodoDePago', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MetodoDePago);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\MetodoDePagoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\MetodoDePagoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
