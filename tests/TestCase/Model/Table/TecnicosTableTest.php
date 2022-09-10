<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TecnicosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TecnicosTable Test Case
 */
class TecnicosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TecnicosTable
     */
    public $Tecnicos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tecnicos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tecnicos') ? [] : ['className' => TecnicosTable::class];
        $this->Tecnicos = TableRegistry::getTableLocator()->get('Tecnicos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tecnicos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
