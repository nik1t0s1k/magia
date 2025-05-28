<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reservations}}`.
 */
class m250508_200236_create_reservations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reservations}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'table_id' => $this->integer(),
            'date'=> $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-user',
            '{{%reservations}}',
            'user_id',
            'user',
            'id',
            'CASCADE',
        );

        $this->addForeignKey(
            'fk-tables',
            '{{%reservations}}',
            'table_id',
            'tables',
            'id',
            'CASCADE',
        );

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reservations}}');
    }
}
