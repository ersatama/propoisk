<?php


namespace App\Domain\Contracts;


class TaskContract extends MainContract
{
    const TABLE =   'tasks';

    const FILLABLE  =   [
        self::BLOCKED,
        self::CATEGORY_ID,
        self::SUB_CATEGORY_ID,
        self::CITY_ID,
        self::TITLE,
        self::DESCRIPTION,
        self::PRICE,
    ];
}
