<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\Ware;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderForm extends Model {

    public $name;
    public $address;
    public $phone;
    public $email;
    public $message;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // name, address, phone and email are required
            ['name', 'required', 'message' => 'Как вас зовут?'],
            ['address', 'required', 'message' => 'Укажите адрес склада перевозчика (или ваш почтовый адрес)'],
            ['phone', 'required', 'message' => 'Как с вами связаться?'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Например, john@mail.com'],
            ['message', 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Фамилия, имя, отчество',
            'address' => 'Адрес доставки',
            'phone' => 'Телефон',
            'email' => 'Email',
            'message' => 'Дополнительная информация',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function send($email, $cartWares) {
        if ($this->validate()) {
            $body = '<table cellpadding=10>';
            $body .= '<thead>';
            $body .= '<tr>';
            $body .= '<th>Наименование</th>';
            $body .= '<th>Размер</th>';
            $body .= '<th>Цена</th>';
            $body .= '</tr>';
            $body .= '</thead>';
            $body .= '<tbody>';
            foreach ($cartWares as $cartWare) {
                $body .= '<tr>';
                $body .= '<td>' . '<b>' . $cartWare->_brand->name . '</b>' . '<br>' . $cartWare->code . '</td>';
                $body .= '<td><b>' . $cartWare->sizes . '</b></td>';
		$body .= '<td><b>' . $cartWare->new_price . '</b></td>';
                $body .= '</tr>';
            }
            $body .= '<tr><td colspan=3 align=center><b>Итого: ' . Ware::getCartWaresCost() . '</b></td></tr>';
            $body .= '</tbody>';
            $body .= '</table>';
            $body .= '<table cellpadding=10><tbody>';
            $body .= '<tr><td><b>Фамилия, имя, отчество:</b><br>' . $this->name . '</td></tr>';
            $body .= '<tr><td><b>Адрес доставки:</b><br>' . $this->address . '</td></tr>';
            $body .= '<tr><td><b>Телефон:</b><br>' . $this->phone . '</td></tr>';
	    if ($this->email) {
		$body .= '<tr><td><b>Email:</b><br>' . $this->email . '</td></tr>';
	    }
            if (trim($this->message)) {
                $body .= '<tr><td><b>Дополнительная информация:</b><br>' . $this->message . '</td></tr>';
            }
            $body .= '<tr><td>&mdash;<br>Дата: ' . date("d.m.Y, H:i T") .'<br>IP: ' . Yii::$app->request->getUserIP() . '</td></tr>';
            $body .= '</tbody></table>';

            Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setSubject('Omega Shoes / order ' . Ware::getCartWaresCount() . ' (' . Ware::getCartWaresCost() . ')')
                    ->setFrom(Yii::$app->params['adminEmail'])
                    ->setHtmlBody($body)
                    ->send();

            return true;
        }
        return false;
    }

}
