<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tables}}`.
 */
class m250507_105220_create_tables_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tables}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string()
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tables}}');
    }
}
