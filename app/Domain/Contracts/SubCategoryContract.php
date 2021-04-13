<?php


namespace App\Domain\Contracts;


class SubCategoryContract extends MainContract
{
    const TABLE =   'sub_categories';

    const FILLABLE  =   [
        self::CATEGORY_ID,
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
