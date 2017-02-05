<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $country_name
 * @property string $country_code
 * @property string $description
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'country_name', 'country_code', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'logo', 'country_name', 'country_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Торговая марка',
            'logo' => 'Путь к логотипу',
            'country_name' => 'Страна',
            'country_code' => 'Код страны',
            'description' => 'Описание',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\BrandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\BrandQuery(get_called_class());
    }
}
