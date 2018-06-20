<?php
namespace TinyPost\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsFixture
 *
 */
class PostsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'body' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'excerpt' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'slug' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'keywords' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'available' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modified_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'modified_by' => ['type' => 'index', 'columns' => ['modified_by'], 'length' => []],
            'created_by' => ['type' => 'index', 'columns' => ['created_by'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'slug' => ['type' => 'unique', 'columns' => ['slug'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Available',
                'body' => '',
                'excerpt' => '',
                'slug' => 'available',
                'description' => '',
                'keywords' => '',
                'available' => '2000-01-01 00:00:00',
                'deleted' => null,
                'created' => null,
                'modified' => null,
                'created_by' => null,
                'modified_by' => null
            ],
            [
                'id' => 2,
                'title' => 'Future',
                'body' => '',
                'excerpt' => '',
                'slug' => 'future',
                'description' => '',
                'keywords' => '',
                'available' => '2050-01-01 00:00:00',
                'deleted' => null,
                'created' => null,
                'modified' => null,
                'created_by' => null,
                'modified_by' => null
            ],
            [
                'id' => 3,
                'title' => 'Draft',
                'body' => '',
                'excerpt' => '',
                'slug' => 'draft',
                'description' => '',
                'keywords' => '',
                'available' => null,
                'deleted' => null,
                'created' => null,
                'modified' => null,
                'created_by' => null,
                'modified_by' => null
            ],
            [
                'id' => 4,
                'title' => 'Deleted',
                'body' => '',
                'excerpt' => '',
                'slug' => 'deleted',
                'description' => '',
                'keywords' => '',
                'available' => '2001-01-01 00:00:00',
                'deleted' => '2001-01-02 00:00:00',
                'created' => null,
                'modified' => null,
                'created_by' => null,
                'modified_by' => null
            ],
        ];
        parent::init();
    }
}
