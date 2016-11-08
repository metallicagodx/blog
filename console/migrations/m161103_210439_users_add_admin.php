<?php

use yii\db\Migration;

class m161103_210439_users_add_admin extends Migration
{
    private $tableName = '{{%users}}';
    private $username = 'admin';
    private $password = 'qwerty';

    public function up()
    {
        $this->insert($this->tableName, [
            'username' => $this->username,
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash($this->password),
            'email' => 'admin@gmail.com',
            'status' => '10',
        ]);
    }

    public function down()
    {
        $this->delete($this->tableName, ['username' => $this->username]);
    }
}
