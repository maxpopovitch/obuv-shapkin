<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sole_material".
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 */
class SoleMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sole_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['position'], 'integer'],
            [['position'], 'unique'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Материал подошвы',
            'position' => 'Позиция',
        ];
    }
}
