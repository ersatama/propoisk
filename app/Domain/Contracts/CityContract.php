<?php


namespace App\Domain\Contracts;


class CityContract extends MainContract
{
    const TABLE =   'cities';

    const FILLABLE  =   [
        self::BLOCKED,
        self::REGION_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
