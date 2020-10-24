<?php

use yii\db\Migration;

class m170208_150233_user_table_create extends Migration {

    public function up() {
        $tableOptions = '';
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->comment('Username'),
            'password_hash' => $this->string()->notNull()->comment('Password hash'),
            'auth_key' => $this->string()->notNull()->comment('Auth key')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('user');
    }

}
