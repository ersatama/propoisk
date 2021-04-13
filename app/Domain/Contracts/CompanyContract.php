<?php


namespace App\Domain\Contracts;


class CompanyContract extends MainContract
{
    const TABLE =   'companies';

    const FILLABLE  =   [
        self::BLOCKED,
        self::USER_ID,
        self::TITLE,
        self::DESCRIPTION,
        self::ICON,
        self::PARENT_ID,
        self::LFT,
        self::RGT,
        self::DEPTH
    ];
}
