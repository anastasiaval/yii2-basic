<?php

use yii\db\Migration;

/**
 * Class m181007_180303_add_table_user
 */
class m181007_180303_add_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'access_token' => $this->string(255),
            'auth_key' => $this->string(255),
            'creator_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181007_180303_add_table_user cannot be reverted.\n";

        return false;
    }
    */
}
