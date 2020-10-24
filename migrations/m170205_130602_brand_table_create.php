<?php

use yii\db\Migration;

class m170205_130602_brand_table_create extends Migration {

    public function up() {
        $tableOptions = '';
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Brand name'),
            'country_name' => $this->string()->notNull()->comment('Country name'),
            'country_code' => $this->string()->notNull()->comment('2-letters code'),
            'description' => $this->text()->notNull()->comment('Description')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('brand');
    }
}
