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
            ['email', 'required', 'message' => 'Например, john@mail.com'],
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
            $body = $body . '<thead>';
            $body = $body . '<tr>';
            $body = $body . '<th>Наименование</th>';
            $body = $body . '<th>Размер</th>';
            $body = $body . '<th>Цена</th>';
            $body = $body . '</tr>';
            $body = $body . '</thead>';
            $body = $body . '<tbody>';
            foreach ($cartWares as $cartWare) {
                $body = $body . '<tr>';
                $body = $body . '<td>' . '<b>' . $cartWare->_brand->name . '</b>' . '<br>' . $cartWare->code . '</td>';
                $body = $body . '<td><b>' . $cartWare->sizes . '</b></td>';
		$body = $body . '<td><b>' . $cartWare->new_price . '</b></td>';
                $body = $body . '</tr>';
            }
            $body = $body . '<tr><td colspan=3 align=center><b>Итого: ' . Ware::getCartWaresCost() . '</b></td></tr>';
            $body = $body . '</tbody>';
            $body = $body . '</table>';
            $body = $body . '<table cellpadding=10><tbody>';
            $body = $body . '<tr><td><b>Фамилия, имя, отчество:</b><br>' . $this->name . '</td></tr>';
            $body = $body . '<tr><td><b>Адрес доставки:</b><br>' . $this->address . '</td></tr>';
            $body = $body . '<tr><td><b>Телефон:</b><br>' . $this->phone . '</td></tr>';
            $body = $body . '<tr><td><b>Email:</b><br>' . $this->email . '</td></tr>';
            if (trim($this->message)) {
                $body = $body . '<tr><td><b>Дополнительная информация:</b><br>' . $this->message . '</td></tr>';
            }
            $body = $body . '<tr><td>&mdash;<br>Дата: ' . date("d.m.Y, H:i T") .'<br>IP: ' . Yii::$app->request->getUserIP() . '</td></tr>';
            $body = $body . '</tbody></table>';

            Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setSubject('obuv.co/order' . Ware::getCartWaresCount() . ' (' . Ware::getCartWaresCost() . ')')
                    ->setFrom([$this->email => $this->name])
                    ->setHtmlBody($body)
                    ->send();

            return true;
        }
        return false;
    }

}
