<?php
use Migrations\AbstractMigration;

class AddStatusToPosts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('posts');
        $table->addColumn('status', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
            'after' => 'deleted'
        ]);
        $table->update();
    }
}
