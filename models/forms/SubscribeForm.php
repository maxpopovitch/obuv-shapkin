<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;

/**
 * SubscribeForm is the model behind the subscribe form.
 */
class SubscribeForm extends Model
{
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email is required
            ['email', 'required', 'message' => 'Укажите email'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Например: john@mail.com'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function subscribe($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
