<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messaging".
 *
 * @property integer $id
 * @property string $emails
 * @property integer $created
 * @property integer $sent
 * @property integer $status
 * @property string $subject
 * @property string $content
 */
class Messaging extends \yii\db\ActiveRecord
{
  const STATUS_NEW = 1;
  const STATUS_SENT = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messaging';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emails', 'created', 'sent', 'status', 'subject', 'content'], 'required'],
            [['emails', 'content'], 'string'],
            [['created', 'sent', 'status'], 'integer'],
            [['subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emails' => 'Получатели (выбрать всех)',
            'created' => 'Дата создания',
            'sent' => 'Дата отправки',
            'status' => 'Статус',
            'subject' => 'Тема сообщения',
            'content' => 'Текст сообщения',
        ];
    }
    
    public static function getStatuses()
    {
      return [
	  self::STATUS_NEW => 'Новое',
	  self::STATUS_SENT => 'Отправленное'
      ];
    }
}
