<?php

namespace AlexBklnv\DaData\DTO\Address;

use AlexBklnv\DaData\DTO\AbstractDTO;
use AlexBklnv\DaData\DTO\Address\Data\AddressSuggestData;

/**
 * DTO для работы с поиском адресов по методам https://dadata.ru/api/suggest/address/
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class AddressSuggest extends AbstractDTO
{
    /**
     * @var null|string Адрес одной строкой (как показывается в списке подсказок)
     */
    public ?string $value;
    
    /**
     * @var null|string Адрес одной строкой (полный, с индексом)
     */
    public ?string $unrestricted_value;
    
    /**
     * @var null|AddressSuggestData Адрес одной строкой (полный, с индексом)
     */
    public ?AddressSuggestData $data;
    
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->unrestricted_value;
    }
}
