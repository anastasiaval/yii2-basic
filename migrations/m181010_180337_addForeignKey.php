<?php

use yii\db\Migration;

/**
 * Class m181010_180337_addForeignKey
 */
class m181010_180337_addForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_taskuser_user', 'task_user', ['user_id'], 'user', ['id']);
        $this->addForeignKey('fx_taskuser_task', 'task_user', ['task_id'], 'task', ['id']);
        $this->addForeignKey('fx_task_user1', 'task', ['creator_id'], 'user', ['id']);
        $this->addForeignKey('fx_task_user2', 'task', ['updater_id'], 'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_taskuser_user', 'task_user');
        $this->dropForeignKey('fx_taskuser_task', 'task_user');
        $this->dropForeignKey('fx_task_user1', 'task');
        $this->dropForeignKey('fx_task_user2', 'task');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181010_180337_addForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
