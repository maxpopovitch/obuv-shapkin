<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email and body are required
            ['name', 'required', 'message' => 'Как вас зовут?'],
            ['email', 'required', 'message' => 'Укажите адрес e-mail'],
            ['body', 'required', 'message' => 'Напишите сообщение.'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Например, john@mail.com'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
	    $body = 'Отправитель: ' . $this->name . "\r\n";
	    $body = $body . 'Email: ' . $this->email . "\r\n";
	    $body = $body . 'Сообщение: ' . $this->body;
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTextBody($body)
                ->send();

            return true;
        }
        return false;
    }
}
