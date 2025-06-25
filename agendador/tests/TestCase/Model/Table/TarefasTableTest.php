<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TarefasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TarefasTable Test Case
 */
class TarefasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TarefasTable
     */
    protected $Tarefas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tarefas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tarefas') ? [] : ['className' => TarefasTable::class];
        $this->Tarefas = $this->getTableLocator()->get('Tarefas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tarefas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TarefasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
