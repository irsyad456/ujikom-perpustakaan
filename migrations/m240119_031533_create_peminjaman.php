<?php

use yii\db\Migration;

/**
 * Class m240119_031533_create_peminjaman
 */
class m240119_031533_create_peminjaman extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%peminjaman}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'buku_id' => $this->integer(),
            'tanggal_peminjaman' => $this->date(),
            'tanggal_pengembalian' => $this->date(),
            'status_peminjaman' => "ENUM('Dipinjam', 'Diperpanjang', 'Dikembalikan', 'Terlambat', 'Hilang', 'Rusak')"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%peminjaman}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_031533_create_peminjaman cannot be reverted.\n";

        return false;
    }
    */
}
