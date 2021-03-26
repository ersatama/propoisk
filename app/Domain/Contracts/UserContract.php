<?php

namespace App\Domain\Contracts;

class UserContract extends MainContract
{
    const TABLE =   'users';

    const FILLABLE  =   [
        self::STATUS,
        self::BLOCKED,
        self::NAME,
        self::SURNAME,
        self::LAST_NAME,
        self::BIRTHDATE,
        self::PUSH_NOTIFICATION,
        self::CODE,
        self::PHONE,
        self::PHONE_VERIFIED_AT,
        self::EMAIL,
        self::EMAIL_VERIFIED_AT,
        self::PASSWORD,
        self::API_TOKEN
    ];

    const HIDDEN    =   [
        self::PASSWORD,
        self::REMEMBER_TOKEN
    ];

    const CASTS =   [
        self::PHONE_VERIFIED_AT =>  'datetime',
        self::EMAIL_VERIFIED_AT =>  'datetime'
    ];
}
