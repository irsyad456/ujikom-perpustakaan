<?php

use yii\db\Migration;

/**
 * Class m240227_023426_user_seeder
 */
class m240227_023426_user_seeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Faker\Factory::create();

        $user = [];

        for ($i = 0; $i < 10; $i++) {
            $user[] = [
                'nama' => $faker->firstName(),
                'email' => $faker->email(),
                'username' => $faker->userName,
                'password_hash' => Yii::$app->security->generatePasswordHash('12345678'),
                'alamat' => $faker->address,
                'created_at' => $faker->date(),
                'updated_at' => $faker->date(),
            ];
        }

        $this->batchInsert('{{%user}}', ['nama', 'email', 'username', 'password_hash', 'alamat', 'created_at', 'updated_at'], $user);

        // Role Assignment
        $roles = ['Administrator', 'Petugas', 'Peminjam'];

        for ($userId = 2; $userId < 11; $userId++) {
            $randomRoles = $roles[array_rand($roles)];
            $this->insert('auth_assignment', [
                'item_name' => $randomRoles,
                'user_id' => $userId,
                'created_at' => date('Y-m-d')
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m240227_023426_user_seeder cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_023426_user_seeder cannot be reverted.\n";

        return false;
    }
    */
}
