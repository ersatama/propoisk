<?php


namespace App\Domain\Contracts;


class CategoryContract extends MainContract
{
    const TABLE =   'categories';

    const FILLABLE  =   [
        self::BLOCKED,
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::DESCRIPTION,
        self::DESCRIPTION_EN,
        self::DESCRIPTION_KZ,
        self::ICON,
        self::IMG,
        self::PARENT_ID,
        self::LFT,
        self::RGT,
        self::DEPTH
    ];
}
