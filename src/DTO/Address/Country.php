<?php

namespace AlexBklnv\DaData\DTO\Address;

use AlexBklnv\DaData\DTO\AbstractDTO;
use AlexBklnv\DaData\DTO\Address\Data\CountryData;

/**
 * DTO для работы с API: страны
 *
 * @link https://data.gov.ru/opendata/7710168515-obscherossiyskiyklassifikatorstranmiraoxm Общероссийский классификатор стран мира (ОКСМ)
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class Country extends AbstractDTO
{
    /**
     * @var null|string Значение одной строкой (как показывается в списке подсказок)
     */
    public ?string $value;
    
    /**
     * @var null|string Адрес одной строкой (полный, с индексом)
     */
    public ?string $unrestricted_value;
    
    /**
     * @var null|CountryData Информация по стране
     */
    public ?CountryData $data;
}