<?php
use Migrations\AbstractMigration;

class AddPostProperties extends AbstractMigration
{
    public function up()
    {

        $this->table('post_properties')
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('post_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('key', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('updated', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('position', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'post_id',
                ]
            )
            ->addIndex(
                [
                    'key',
                ]
            )
            ->addIndex(
                [
                    'position',
                ]
            )
            ->create();
    }

    public function down()
    {
        $this->dropTable('post_properties');
    }
}
