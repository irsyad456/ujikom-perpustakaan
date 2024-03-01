<?php

use yii\db\Migration;

/**
 * Class m240119_030103_create_buku_kategori_buku
 */
class m240119_030103_create_buku_kategori_buku extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%buku}}', [
            'id' => $this->primaryKey(),
            'judul' => $this->string(),
            'penulis' => $this->string(),
            'penerbit' => $this->string(),
            'tahunTerbit' => $this->date()
        ]);

        $this->createTable('{{%kategori_buku}}', [
            'id' => $this->primaryKey(),
            'namaKategori' => $this->string()
        ]);

        $this->createTable('{{%kategori_buku_relasi}}', [
            'id' => $this->primaryKey(),
            'buku_id' => $this->integer(),
            'kategoribuku_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%buku}}');
        $this->dropTable('{{%kategori_buku}}');
        $this->dropTable('{{%kategori_buku_relasi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_030103_create_buku_kategori_buku cannot be reverted.\n";

        return false;
    }
    */
}
