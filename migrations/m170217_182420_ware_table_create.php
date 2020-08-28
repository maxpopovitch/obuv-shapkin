<?php

use yii\db\Migration;

class m170217_182420_ware_table_create extends Migration
{
     public function up() {
        $tableOptions = '';
        $this->createTable('ware', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->comment('Code'),
            'brand' => $this->integer()->notNull()->comment('Brand'),
            'sex' => $this->integer()->notNull()->comment('Sex'),
            'saison' => $this->integer()->notNull()->comment('Saison'),
            'type' => $this->integer()->notNull()->comment('Type'),
            'wideness' => $this->integer()->notNull()->comment('Wideness'),
            'upper' => $this->integer()->notNull()->comment('Upper material'),
            'lining' => $this->integer()->notNull()->comment('Lining material'),
            'sole' => $this->integer()->notNull()->comment('Sole material'),
            'heel_height' => $this->integer()->notNull()->comment('Heel height'),
            'color' => $this->integer()->notNull()->comment('Color'),
            'category' => $this->integer()->notNull()->comment('Category'),
            'init_price' => $this->float()->notNull()->comment('Initial price'),
            'new_price' => $this->float()->notNull()->comment('New price'),
            'waterproofness' => $this->integer()->notNull()->comment('Waterproofness'),
            'status' => $this->integer()->notNull()->comment('Status'),
            'position' => $this->integer()->notNull()->comment('Position')
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('ware');
    }
}
