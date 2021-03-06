<?php
use Migrations\AbstractMigration;

class CreateAuthTokens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function change()
    {
        $table = $this->table('auth_tokens');

        $table->addColumn('series', 'string', [
            'null' => false
        ]);
        $table->addIndex(['series'], [
            'unique' => true,
            'name' => 'id_auth_tokens_series'
        ]);

        $table->addColumn('token', 'string', [
            'null' => false
        ]);
        $table->addIndex(['token'], [
            'unique' => false,
            'name' => 'id_auth_tokens_token'
        ]);

        $table->addColumn('created', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
        ]);

        $table->addColumn('expires', 'datetime', [
            'null' => false,
        ]);
        $table->addIndex(['expires'], [
            'unique' => false,
            'name' => 'id_auth_tokens_expires'
        ]);

        /**
         * Edit this part if it doesn't fit to your database.
         * In specific have a look at the data type ('integer'),
         * and whether it should be signed or unsigned.
         */
        $table
            ->addColumn('user_id', 'integer', [
                'null' => false,
                'signed' => false,
                'limit'=> 10
            ])
            ->addForeignKey('user_id', 'Users', 'id',
                ['delete' => 'CASCADE', 'update' => 'CASCADE']
            )
            ->addIndex(['user_id'], ['unique' => false, 'name' => 'id_auth_tokens_user_id']);


        $table->create();
    }
}
