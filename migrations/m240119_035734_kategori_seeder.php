<?php

use yii\db\Migration;

/**
 * Class m240119_035734_kategori_seeder
 */
class m240119_035734_kategori_seeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Start Kategori Seeder
        $data = [
            ['namaKategori' => 'Mystery'],
            ['namaKategori' => 'Fantasy'],
            ['namaKategori' => 'Romance'],
            ['namaKategori' => 'Thriller'],
            ['namaKategori' => 'History'],
            ['namaKategori' => 'Science'],
        ];

        $this->batchInsert('{{%kategori_buku}}', array_keys($data[0]), $data);
        // End Kategori Seeder

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m240119_035734_kategori_seeder cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_035734_kategori_seeder cannot be reverted.\n";

        return false;
    }
    */
}
