<?php


namespace App\Domain\Contracts;


class CountryContract extends MainContract
{
    const TABLE =   'countries';

    const FILLABLE  =   [
        self::BLOCKED,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
