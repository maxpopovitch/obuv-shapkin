<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 */
class BackendUser extends \yii\db\ActiveRecord implements IdentityInterface {
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password_hash', 'auth_key'], 'required'],
            [['username'], 'string', 'max' => 10],
            [['password_hash'], 'string', 'max' => 30],
            [['auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password hash',
            'auth_key' => 'Auth key',
        ];
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($auth_key) {
        return $this->auth_key === $auth_key;
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUserName($username) {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password) {
        return $this->password_hash === $password;
    }

}
