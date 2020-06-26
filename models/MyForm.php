<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MyForm extends Model
{
    public $name;
    public $phone;
    public $message;

    public function rules()
    {
        return [
            [['name', 'phone', 'message'], 'required'],
            [['phone'], 'number'],
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
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo($email)
                ->setSubject('Письмо с сайта yii.task11.ru')
                ->setHtmlBody(
                    'Имя: '.$this->name.'<br>Cообщение: '.$this->message.'<br>Телефон: '.$this->phone
                )
                ->send();

            return true;
        }
        return false;
    }
}
