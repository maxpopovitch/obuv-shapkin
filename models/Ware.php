<?php

namespace app\models;

use Yii;
use app\models\Brand;
use app\models\ShoesType;
use app\models\Color;
use app\models\Category;
use app\models\Wideness;
use app\models\UpperMaterial;
use app\models\LiningMaterial;
use app\models\SoleMaterial;

/**
 * This is the model class for table "ware".
 *
 * @property integer $id
 * @property string $code
 * @property integer $brand
 * @property integer $sex
 * @property integer $saison
 * @property integer $type
 * @property integer $wideness
 * @property integer $upper
 * @property integer $lining
 * @property integer $sole
 * @property integer $heel_height
 * @property integer $color
 * @property integer $category
 * @property double $init_price
 * @property double $new_price
 * @property integer $waterproofness
 * @property integer $status
 * @property integer $position
 */
class Ware extends \yii\db\ActiveRecord
{
    const SEX_MALE = 1;
    const SEX_FEMALE = 2;
    
    const WATERPROOFNESS_FALSE = 1;
    const WATERPROOFNESS_TRUE = 2;
    
    const SAISON_DEMI = 1;
    const SAISON_SUMMER = 2;
    const SAISON_WINTER = 3;
    
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    
    const CATEGORY_DEFAULT = 0;
    const CATEGORY_NEW = 1;
    const CATEGORY_SALE = 2;
    const CATEGORY_BESTSELLER = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ware';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'brand', 'sex', 'saison', 'type', 'wideness', 'upper', 'lining', 'sole', 'heel_height', 'color', 'category', 'init_price', 'new_price', 'waterproofness', 'status', 'position'], 'required'],
            [['brand', 'sex', 'saison', 'type', 'wideness', 'upper', 'lining', 'sole', 'heel_height', 'color', 'category', 'waterproofness', 'status', 'position'], 'integer'],
            [['position', 'code'], 'unique'],
            [['init_price', 'new_price'], 'number'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Артикул',
            'brand' => 'Торговая марка',
            'sex' => 'Пол',
            'saison' => 'Сезон',
            'type' => 'Тип',
            'wideness' => 'Полнота',
            'upper' => 'Материал верха',
            'lining' => 'Материал подкладки',
            'sole' => 'Материал подошвы',
            'heel_height' => 'Высота каблука',
            'color' => 'Цвет',
            'category' => 'Категория',
            'init_price' => 'Начальная цена',
            'new_price' => 'Новая цена',
            'waterproofness' => 'Защита от промокания',
            'status' => 'Статус',
            'position' => 'Позиция',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\WareQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\WareQuery(get_called_class());
    }

    /**
     * 
     * @return array
     */
    public static function getSex()
    {
        return [
            self::SEX_MALE => 'мужской',
            self::SEX_FEMALE => 'женский'
        ];
    }

    /**
     * 
     * @return array
     */
    public static function getWaterproofness()
    {
        return [
            self::WATERPROOFNESS_FALSE => 'нет данных',
            self::WATERPROOFNESS_TRUE => 'водонепроницаемые'
        ];
    }

    /**
     * 
     * @return array
     */
    public static function getSaison()
    {
        return [
            self::SAISON_DEMI => 'весна-осень',
            self::SAISON_SUMMER => 'лето',
            self::SAISON_WINTER => 'зима'
        ];
    }

    /**
     * 
     * @return array
     */
    public static function getStatus()
    {
        return [
            self::STATUS_ACTIVE => 'активный',
            self::STATUS_INACTIVE => 'неактивный'
        ];
    }

    /**
     * 
     * @return array
     */
    public static function getCategory()
    {
        return [
            self::CATEGORY_DEFAULT => 'не указана',
            self::CATEGORY_NEW => 'новинка',
            self::CATEGORY_SALE => 'распродажа',
            self::CATEGORY_BESTSELLER => 'хит продаж',
        ];
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_brand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_type()
    {
        return $this->hasOne(ShoesType::className(), ['id' => 'type']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_color()
    {
        return $this->hasOne(Color::className(), ['id' => 'color']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_wideness()
    {
        return $this->hasOne(Wideness::className(), ['id' => 'wideness']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_upper()
    {
        return $this->hasOne(UpperMaterial::className(), ['id' => 'upper']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_lining()
    {
        return $this->hasOne(LiningMaterial::className(), ['id' => 'lining']);
    }

    /**
     * 
     * @return \yii\db\ActiveQuery
     */
     public function get_sole()
    {
        return $this->hasOne(SoleMaterial::className(), ['id' => 'sole']);
    }
}
