<?php

namespace App\Services\Sms;

use App\Services\BaseService;

class SmsService extends BaseService
{

    protected $login    =   'sms_api';
    protected $password =   'Qwerty000';
    protected $url      =   'https://smsc.kz/sys/send.php';
    protected $code;

    public function sendCode(string $phone, int $code)
    {
        $this->code =   $code;
        $ch =   curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.'?'.$this->getParameters($phone));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
    }

    public function getParameters(string $phone):string
    {
        return http_build_query([
            'login'     =>  $this->login,
            'psw'       =>  $this->password,
            'phones'    =>  $phone,
            'mes'       =>  $this->message()
        ]);
    }

    public function message():string
    {
        return 'Ваш код: '.$this->code.' для подтверждения регистрации';
    }
}
