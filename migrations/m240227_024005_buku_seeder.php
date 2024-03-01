<?php

use yii\db\Migration;

/**
 * Class m240227_024005_buku_seeder
 */
class m240227_024005_buku_seeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Faker\Factory::create();

        $buku = [];

        for ($i = 0; $i < 10; $i++) {
            $buku[] = [
                'judul' => $faker->word(),
                'penulis' => $faker->firstName(),
                'penerbit' => $faker->company(),
                'tahunTerbit' => $faker->date()
            ];
        }

        $this->batchInsert('{{%buku}}', ['judul', 'penulis', 'penerbit', 'tahunTerbit'], $buku);

        // Random Buku To Kategori Buku Relasi
        for ($bukuId = 1; $bukuId <= 10; $bukuId++) {
            $randomKategoriBukuId = rand(1, 6);
            $this->insert('{{%kategori_buku_relasi}}', [
                'buku_id' => $bukuId,
                'kategoribuku_id' => $randomKategoriBukuId
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m240227_024005_buku_seeder cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_024005_buku_seeder cannot be reverted.\n";

        return false;
    }
    */
}
