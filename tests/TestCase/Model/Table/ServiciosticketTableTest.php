<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiciosticketTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiciosticketTable Test Case
 */
class ServiciosticketTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiciosticketTable
     */
    public $Serviciosticket;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Serviciosticket'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Serviciosticket') ? [] : ['className' => ServiciosticketTable::class];
        $this->Serviciosticket = TableRegistry::getTableLocator()->get('Serviciosticket', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Serviciosticket);

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
