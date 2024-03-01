<?php

use yii\db\Migration;

/**
 * Class m240119_025343_create_user
 */
class m240119_025343_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // Create User Table
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'email' => $this->string()->unique(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(32),
            'alamat' => $this->text(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
        ], $tableOptions);

        // Create user Irsyad
        $this->insert('{{%user}}', [
            'nama' => 'M.Irsyad F',
            'email' => 'irsyad@gmail.com',
            'username' => 'irsyad',
            'password_hash' => Yii::$app->security->generatePasswordHash('12345678'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'alamat' => 'Jl.Jakarta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_025343_create_user cannot be reverted.\n";

        return false;
    }
    */
}
