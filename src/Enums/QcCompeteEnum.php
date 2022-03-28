<?php

namespace AlexBklnv\DaData\Enums;

/**
 * Код пригодности к рассылке
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class QcCompeteEnum
{
    /**
     * @var int Пригоден для почтовой рассылки
     */
    public const OK = 0;
    
    /**
     * @var int Не пригоден, нет региона
     */
    public const NO_REGION = 1;
    
    /**
     * @var int Не пригоден, нет города
     */
    public const NO_CITY = 2;
    
    /**
     * @var int Не пригоден, нет улицы
     */
    public const NO_STREET = 3;
    
    /**
     * @var int Не пригоден, нет дома
     */
    public const NO_HOUSE = 4;
    
    /**
     * @var int    Нет квартиры. Подходит для юридических лиц или частных владений
     */
    public const NO_FLAT = 5;
    
    /**
     * @var int Не пригоден. Адрес неполный
     */
    public const BAD = 6;
    
    /**
     * @var int Не пригоден. Иностранный адрес
     */
    public const FOREIGN = 7;
    
    /**
     * @var int До почтового отделения (абонентский ящик или адрес до востребования). Подходит для писем, но не для курьерской доставки.
     */
    public const POST_OFFICE = 8;
    
    /**
     * @var int Пригоден, но низкая вероятность успешной доставки (дом не найден в ФИАС)
     */
    public const LOW = 10;
}