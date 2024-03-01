<?php

use yii\db\Migration;

/**
 * Class m240119_032612_foreign_key
 */
class m240119_032612_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Many-To-Many KategoriBuku Ke Buku melalui kategori_buku_relasi
        $this->addForeignKey('fk_buku_to_kategori', '{{%kategori_buku_relasi}}', 'buku_id', '{{%buku}}', 'id');
        $this->addForeignKey('fk_kategori_to_buku', '{{%kategori_buku_relasi}}', 'kategoribuku_id', '{{%kategori_buku}}', 'id');

        // Many-To-Many user ke buku melalui Peminjaman
        $this->addForeignKey('fk_peminjaman_to_user', '{{%peminjaman}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('fk_user_to_peminjaman', '{{%peminjaman}}', 'buku_id', '{{%buku}}', 'id');

        // Many-To-Many user ke Buku melalui Koleksi
        $this->addForeignKey('fk_koleksi_to_user', '{{%koleksi_pribadi}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('fk_koleksi_to_buku', '{{%koleksi_pribadi}}', 'buku_id', '{{%buku}}', 'id');

        // Many-To-Many user ke buku melalui ulasan_buku
        $this->addForeignKey('fk_ulasan_to_buku', '{{%ulasan_buku}}', 'buku_id', '{{%buku}}', 'id');
        $this->addForeignKey('fk_ulasan_to_user', '{{%ulasan_buku}}', 'user_id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop relasi kategori_buku_relasi
        $this->dropForeignKey('fk_buku_to_kategori', '{{%kategori_buku_relasi}}');
        $this->dropForeignKey('fk_kategori_to_buku', '{{%kategori_buku_relasi}}');

        // Drop relasi peminjaman
        $this->dropForeignKey('fk_peminjaman_to_user', '{{%peminjaman}}');
        $this->dropForeignKey('fk_user_to_peminjaman', '{{%peminjaman}}');

        // Drop relasi koleksi_pribadi
        $this->dropForeignKey('fk_koleksi_to_user', '{{%koleksi_pribadi}}');
        $this->dropForeignKey('fk_koleksi_to_buku', '{{%koleksi_pribadi}}');

        // Drop relasi ulasan_buku
        $this->dropForeignKey('fk_ulasan_to_buku', '{{%ulasan_buku}}');
        $this->dropForeignKey('fk_ulasan_to_user', '{{%ulasan_buku}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_032612_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
