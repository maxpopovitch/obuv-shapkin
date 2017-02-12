<?php

use yii\db\Migration;

class m170212_180550_positions_add_to_existing_tables extends Migration {

    public function up() {
        $this->addColumn('brand', 'position', 'integer');
        $this->addColumn('category', 'position', 'integer');
        $this->addColumn('color', 'position', 'integer');
        $this->addColumn('heel_height', 'position', 'integer');
        $this->addColumn('sole_material', 'position', 'integer');
        $this->addColumn('lining_material', 'position', 'integer');
        $this->addColumn('upper_material', 'position', 'integer');
        $this->addColumn('wideness', 'position', 'integer');
        $this->addColumn('shoes_type', 'position', 'integer');
        $this->addColumn('size', 'position', 'integer');
    }

    public function down() {
        $this->dropColumn('brand', 'position');
        $this->dropColumn('category', 'position');
        $this->dropColumn('color', 'position');
        $this->dropColumn('heel_height', 'position');
        $this->dropColumn('sole_material', 'position');
        $this->dropColumn('lining_material', 'position');
        $this->dropColumn('upper_material', 'position');
        $this->dropColumn('wideness', 'position');
        $this->dropColumn('shoes_type', 'position');
        $this->dropColumn('size', 'position');
    }

}
