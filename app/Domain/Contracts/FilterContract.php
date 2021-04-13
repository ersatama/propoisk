<?php


namespace App\Domain\Contracts;


class FilterContract extends MainContract
{
    const TABLE =   'filters';

    const FILLABLE  =   [
        self::SUB_CATEGORY_ID,
        self::BLOCKED,
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::PARENT_ID,
        self::LFT,
        self::RGT,
        self::DEPTH
    ];
}
