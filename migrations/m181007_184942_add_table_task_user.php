<?php

use yii\db\Migration;

/**
 * Class m181007_184942_add_table_task_user
 */
class m181007_184942_add_table_task_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_user', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task_user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181007_184942_add_table_task_user cannot be reverted.\n";

        return false;
    }
    */
}
