<?php
use Migrations\AbstractMigration;

class AddUsers extends AbstractMigration
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
        $table = $this->table('users');

        $table->addColumn('first_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('last_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('lti_user_id', 'string', [
            'default' => null,
            'limit' => 1024,
            'null' => true
        ]);

        $table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 1024,
            'null' => true
        ]);

        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 1024,
            'null' => true
        ]);

        $table->create();
    }
}
