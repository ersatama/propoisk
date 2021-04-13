<?php


namespace App\Domain\Contracts;


class RegionContract extends MainContract
{
    const TABLE =   'regions';

    const FILLABLE  =   [
        self::BLOCKED,
        self::COUNTRY_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
