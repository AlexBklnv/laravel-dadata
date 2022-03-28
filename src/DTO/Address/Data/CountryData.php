<?php

namespace AlexBklnv\DaData\DTO\Address\Data;

use AlexBklnv\DaData\DTO\AbstractDTO;

/**
 * DTO данных для страны
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class CountryData extends AbstractDTO
{
    /**
     * @var null|string|int Цифровой код страны
     */
    public $code;
    
    /**
     * @var null|string Буквенный код альфа-2
     */
    public ?string $alfa2;
    
    /**
     * @var null|string Буквенный код альфа-3
     */
    public ?string $alfa3;
    
    /**
     * @var null|string Краткое наименование страны
     */
    public ?string $name_short;
    
    /**
     * @var null|string Полное официальное наименование страны
     */
    public ?string $name;
}