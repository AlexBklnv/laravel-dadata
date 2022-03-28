<?php

namespace AlexBklnv\DaData\DTO\Profile;

use AlexBklnv\DaData\DTO\AbstractDTO;

/**
 * DTO Статистика использования
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class Statistic extends AbstractDTO
{
    /**
     * @var null|string date
     */
    public ?string $date;
    
    /**
     * @var null|array Стастика сервисов
     * @link https://dadata.ru/api/stat/
     */
    public ?array $services;
}