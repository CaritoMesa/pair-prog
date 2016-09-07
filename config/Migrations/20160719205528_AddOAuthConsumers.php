<?php
use Migrations\AbstractMigration;

class AddOAuthConsumers extends AbstractMigration
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
        $table = $this->table('o_auth_consumers');

        $table->addColumn('key', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('secret', 'string', [
            'default' => null,
            'limit' => 2048,
            'null' => false
        ]);

        $table->create();
    }
}
