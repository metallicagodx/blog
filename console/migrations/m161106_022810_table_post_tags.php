<?php

use yii\db\Migration;

class m161106_022810_table_post_tags extends Migration
{
    private $tableName = '{{%posts_tags}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('post_tag_index', 'posts_tags', ['post_id', 'tag_id']);
        $this->addForeignKey('fk_post_tag_post', 'posts_tags', 'post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_post_tag_tag', 'posts_tags', 'tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_post_tag_post', $this->tableName);
        $this->dropForeignKey('fk_post_tag_tag', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
