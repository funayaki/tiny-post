<?php
namespace TinyPost\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use TinyPost\Model\Table\PostPropertiesTable;

/**
 * TinyPost\Model\Table\PostPropertiesTable Test Case
 */
class PostPropertiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \TinyPost\Model\Table\PostPropertiesTable
     */
    public $PostProperties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.tiny_post.post_properties',
        'plugin.tiny_post.posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PostProperties') ? [] : ['className' => PostPropertiesTable::class];
        $this->PostProperties = TableRegistry::get('PostProperties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PostProperties);

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
