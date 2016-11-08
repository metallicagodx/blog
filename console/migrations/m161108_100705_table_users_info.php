<?php

use yii\db\Migration;

class m161108_100705_table_users_info extends Migration
{
    private $tableName = '{{%users_info}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'user_id' => $this->primaryKey(),
            'avatar' => $this->string(256),
            'gender' => $this->smallInteger()->notNull()->defaultValue(0),
            'dob' => $this->integer(),
            'country' => $this->string(64),
            'city' => $this->string(64),
            'about' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_user_id', 'users_info', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_user_id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
