<?php

namespace AlexBklnv\DaData\Enums;

/**
 * Уровень детализации, до которого адрес найден в ФИАС
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class FiasLevelEnum
{
    /**
     * @var int Страна
     */
    public const COUNTRY = 0;
    
    /**
     * @var int Регион
     */
    public const REGION = 1;
    
    /**
     * @var int Район
     */
    public const AREA = 3;
    
    /**
     * @var int Город
     */
    public const CITY = 4;
    
    /**
     * @var int Населенный пункт
     */
    public const SETTLEMENT = 6;
    
    /**
     * @var int Улица
     */
    public const STREET = 7;
    
    /**
     * @var int Дом
     */
    public const HOUSE = 8;
    
    /**
     * @var int Квартал
     */
    public const QUARTER = 9;
    
    /**
     * @var int Планировочная структура
     */
    public const STRUCTURE = 65;
    
    /**
     * @var int Доп.территория
     */
    public const ADD_TERRITORY = 90;
    
    /**
     * @var int Улица в доп. территории
     */
    public const STREET_ADD_TERRITORY = 91;
    
    /**
     * @var int Иностранный или пустой
     */
    public const UNKNOWN = -1;
}