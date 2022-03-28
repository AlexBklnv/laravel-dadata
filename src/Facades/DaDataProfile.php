<?php

namespace AlexBklnv\DaData\Facades;

use AlexBklnv\DaData\DTO\Profile\Balance;
use AlexBklnv\DaData\DTO\Profile\Relevance;
use AlexBklnv\DaData\DTO\Profile\Statistic;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Relevance getRelevance()
 * @method static Statistic getStat($date = null)
 * @method static Balance getBalance()
 *
 * @author AlexBklnv <alexbklnv@yandex.ru>
 * @see \AlexBklnv\DaData\DaDataProfileService
 */
class DaDataProfile extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return self::class;
    }
}
