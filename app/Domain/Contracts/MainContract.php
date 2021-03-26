<?php


namespace App\Domain\Contracts;


use Carbon\Carbon;

class MainContract
{
    const ID    =   'id';

    const STATUS    =   'status';
    const BLOCKED   =   'blocked';

    const ICON  =   'icon';
    const IMG   =   'img';
    const PARENT_ID =   'parent_id';
    const LFT   =   'lft';
    const RGT   =   'rgt';
    const DEPTH =   'depth';

    const USER  =   'user';
    const ADMIN =   'admin';
    const SUPER_ADMIN   =   'super_admin';
    const STATUS_VALUES =   [
        self::USER,
        self::ADMIN,
        self::SUPER_ADMIN
    ];

    const TITLE_KZ  =   'title_kz';
    const TITLE_EN  =   'title_en';
    const TITLE =   'title';
    const DESCRIPTION_KZ    =   'description_kz';
    const DESCRIPTION_EN    =   'description_en';
    const DESCRIPTION   =   'description';
    const NAME  =   'name';
    const SURNAME   =   'surname';
    const LAST_NAME =   'last_name';
    const BIRTHDATE =   'birthdate';
    const CODE  =   'code';
    const PHONE =   'phone';
    const PHONE_VERIFIED_AT =   'phone_verified_at';
    const EMAIL =   'email';
    const EMAIL_VERIFIED_AT =   'email_verified_at';
    const PASSWORD  =   'password';
    const PUSH_NOTIFICATION =   'push_notification';
    const UPDATED_AT    =   'updated_at';
    const CREATED_AT    =   'created_at';
    const REMEMBER_TOKEN    =   'remember_token';
    const API_TOKEN =   'api_token';
    const ON    =   'on';
    const OFF   =   'off';
    const STATE =   [
        self::ON,
        self::OFF
    ];

    const TRANSLATE =   [
        UserContract::USER          =>  'Пользователь',
        UserContract::ADMIN         =>  'Модератор',
        UserContract::SUPER_ADMIN   =>  'Администратор',
        UserContract::ON            =>  'Активный',
        UserContract::OFF           =>  'Заблокирован',
        'NOT_VERIFIED'              =>  'Не подтвержден',
        'VERIFIED'                  =>  'Подтвержден',
        'NOT_SPECIFIED'             =>  ''
    ];

    public static function getCheck($value)
    {
        $value  =   strtolower($value);
        if (array_key_exists($value,self::TRANSLATE)) {
            return self::TRANSLATE[$value];
        }
        return $value;
    }

    public static function verifiedCheck($value)
    {
        if ($value) {
            return UserContract::TRANSLATE['VERIFIED'].' ('.Carbon::createFromTimeStamp(strtotime($value))->diffForHumans().')';
        }
        return UserContract::TRANSLATE['NOT_VERIFIED'];
    }

    public static function dateCheck($value)
    {
        if ($value) {
            return date('d/m/Y', strtotime($value));
        }
        return self::TRANSLATE['NOT_SPECIFIED'];
    }

}
