<?php

namespace AlexBklnv\DaData\DTO\Address;

use AlexBklnv\DaData\DTO\AbstractDTO;
use AlexBklnv\DaData\DTO\Address\Data\PostalUnitData;

/**
 * DTO для работы с API: отделения Почты России
 *
 * @link https://www.pochta.ru/offices
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class PostalUnit extends AbstractDTO
{
    /**
     * @var null|string Значение одной строкой (как показывается в списке подсказок)
     */
    public ?string $value;
    
    /**
     * @var null|string Адрес одной строкой
     */
    public ?string $unrestricted_value;
    
    /**
     * @var null|PostalUnitData Данные
     */
    public ?PostalUnitData $data;
    
}