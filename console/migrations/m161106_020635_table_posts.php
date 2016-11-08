<?php

use yii\db\Migration;

class m161106_020635_table_posts extends Migration
{
    private $tableName = '{{%posts}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->unique(),
            'slug' => $this->string(128)->notNull()->unique(),
            'lead_photo' => $this->string(128),
            'lead_text' => $this->text(),
            'content' => $this->text()->notNull(),
            'meta_description' => $this->string(160),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'category_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('post_index', 'posts', ['created_by', 'updated_by']);
        $this->addForeignKey('fk_post_category', 'posts', 'category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_post_user_created_by', 'posts', 'created_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_post_user_updated_by', 'posts', 'updated_by', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_post_category', 'posts');
        $this->dropForeignKey('fk_post_user_created_by', 'posts');
        $this->dropForeignKey('fk_post_user_updated_by', 'posts');
        $this->dropTable($this->tableName);
    }
}
