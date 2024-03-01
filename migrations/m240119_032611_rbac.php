<?php

use yii\db\Migration;

/**
 * Class m240119_034601_rbac
 */
class m240119_032611_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_rule', [
            'name' => $this->string(),
            'data' => $this->binary(4294967295),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk_name', 'auth_rule', 'name');

        $this->createTable('auth_item', [
            'name' => $this->string()->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(),
            'data' => $this->binary(4294967295),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk_name', 'auth_item', 'name');
        $this->addForeignKey('fk_auth_rule', 'auth_item', 'rule_name', 'auth_rule', 'name', NULL, 'CASCADE');

        $this->createTable('auth_item_child', [
            'parent' => $this->string(),
            'child' => $this->string()
        ]);
        $this->addPrimaryKey('pk_item_child', 'auth_item_child', ['parent', 'child']);
        $this->addForeignKey('fk_parent_name', 'auth_item_child', 'parent', 'auth_item', 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_child_name', 'auth_item_child', 'child', 'auth_item', 'name', 'CASCADE', 'CASCADE');

        $this->createTable('auth_assignment', [
            'item_name' => $this->string(),
            'user_id' => $this->string(),
            'created_at' => $this->date()
        ]);
        $this->addPrimaryKey('pk_auth_assignment', 'auth_assignment', ['item_name', 'user_id']);
        $this->addForeignKey('fk_auth_assignment', 'auth_assignment', 'item_name', 'auth_item', 'name', 'CASCADE', 'CASCADE');

        // Create role Administrator, Petugas, Peminjam and assign Administrator into user irsyad
        $this->insert('auth_item', [
            'name' => 'Administrator',
            'type' => 1,
            'description' => 'Allow User To Have Access To All Authorization'
        ]);
        $this->insert('auth_item', [
            'name' => 'Petugas',
            'type' => 2,
            'description' => 'Allow user To have Access To Several Authorization'
        ]);
        $this->insert('auth_item', [
            'name' => 'Peminjam',
            'type' => 3,
            'description' => 'Only Allow Peminjaman Feature'
        ]);
        $this->insert('auth_assignment', [
            'item_name' => 'Administrator',
            'user_id' => 1,
            'created_at' => date('Y-m-d')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auth_assignment');
        $this->dropTable('auth_item_child');
        $this->dropTable('auth_item');
        $this->dropTable('auth_rule');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240119_034601_rbac cannot be reverted.\n";

        return false;
    }
    */
}
