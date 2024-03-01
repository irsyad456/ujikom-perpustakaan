<?php

use yii\db\Migration;

/**
 * Class m240119_031316_create_koleksi_pribadi
 */
class m240119_031316_create_koleksi_pribadi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%koleksi_pribadi}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'buku_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%koleksi_pribadi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_031316_create_koleksi_pribadi cannot be reverted.\n";

        return false;
    }
    */
}
