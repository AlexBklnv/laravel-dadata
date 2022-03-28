<?php

namespace AlexBklnv\DaData\DTO\Profile;

use AlexBklnv\DaData\DTO\AbstractDTO;

/**
 * DTO Даты актуальности справочников
 *
 * @link https://dadata.ru/api/version/
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class Relevance extends AbstractDTO
{
    /**
     * @var null|array Параметры dadata
     */
    public ?array $dadata;
    
    /**
     * @var null|array Справочники «подсказок»
     */
    public ?array $suggestions;
    
    /**
     * @var null|array Параметры Справочники «стандартизации»
     */
    public ?array $factor;
}