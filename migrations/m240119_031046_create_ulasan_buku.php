<?php

use yii\db\Migration;

/**
 * Class m240119_031046_create_ulasan_buku
 */
class m240119_031046_create_ulasan_buku extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ulasan_buku}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'buku_id' => $this->integer(),
            'ulasan' => $this->text(),
            'rating' => $this->integer(),
            'created_at' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ulasan_buku}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_031046_create_ulasan_buku cannot be reverted.\n";

        return false;
    }
    */
}
