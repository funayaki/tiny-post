<?php
use Migrations\AbstractMigration;

class AlterPostsCreatedAndModified extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('posts')
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {
        $this->table('posts')
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }
}

