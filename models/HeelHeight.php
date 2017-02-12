<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "heel_height".
 *
 * @property integer $id
 * @property string $name
 */
class HeelHeight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heel_height';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Высота каблука',
        ];
    }
}
