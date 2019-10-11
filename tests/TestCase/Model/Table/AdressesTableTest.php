<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdressesTable Test Case
 */
class AdressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdressesTable
     */
    public $Adresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Adresses',
        'app.Users',
        'app.AdressesDescriptions',
        'app.Expeditions',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Adresses') ? [] : ['className' => AdressesTable::class];
        $this->Adresses = TableRegistry::getTableLocator()->get('Adresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adresses);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
