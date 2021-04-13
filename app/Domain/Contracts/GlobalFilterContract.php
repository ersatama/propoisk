<?php


namespace App\Domain\Contracts;


class GlobalFilterContract extends MainContract
{
    const TABLE =   'global_filters';

    const FILLABLE  =   [
        self::CATEGORY_ID,
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
