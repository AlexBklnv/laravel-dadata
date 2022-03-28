<?php

namespace AlexBklnv\DaData\Enums;

/**
 * Код точности координат
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class QcGeoEnum
{
    /**
     * @var int Точные координаты
     */
    public const EXACT = 0;
    
    /**
     * @var int Ближайший дом
     */
    public const CLOSEST_HOUSE = 1;
    
    /**
     * @var int Улица
     */
    public const STREET = 2;
    
    /**
     * @var int Населенный пункт
     */
    public const SETTLEMENT = 3;
    
    /**
     * @var int Город
     */
    public const CITY = 4;
    
    /**
     * @var int Координаты не определены
     */
    public const UNKNOWN = 5;
    
}