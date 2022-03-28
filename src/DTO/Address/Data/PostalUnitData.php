<?php

namespace AlexBklnv\DaData\DTO\Address\Data;

use AlexBklnv\DaData\DTO\AbstractDTO;

/**
 * DTO данных с API: отделения Почты России
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class PostalUnitData extends AbstractDTO
{
    /**
     * @var null|string Индекс
     */
    public ?string $postal_code;
    
    /**
     * @var null|bool true, если отделение закрыто, иначе false
     */
    public ?bool $is_closed;
    
    /**
     * @var null|string Тип отделения
     */
    public ?string $type_code;
    
    /**
     * @var null|string Адрес одной строкой
     */
    public ?string $address_str;
    
    /**
     * @var null|string КЛАДР-код населённого пункта
     */
    public ?string $address_kladr_id;
    
    /**
     * @var null|string Код проверки адреса
     * @see \AlexBklnv\DaData\Enums\QcEnum
     */
    public ?string $address_qc;
    
    /**
     * @var null|float Координаты: широта
     */
    public ?float $geo_lat;
    
    /**
     * @var null|float Координаты: долгота
     */
    public ?float $geo_lon;
    
    /**
     * @var null|string Режим работы в понедельник
     */
    public ?string $schedule_mon;
    
    /**
     * @var null|string Режим работы во вторник
     */
    public ?string $schedule_tue;
    
    /**
     * @var null|string Режим работы в среду
     */
    public ?string $schedule_wed;
    
    /**
     * @var null|string Режим работы в четверг
     */
    public ?string $schedule_thu;
    
    /**
     * @var null|string Режим работы в пятницу
     */
    public ?string $schedule_fri;
    
    /**
     * @var null|string Режим работы в субботу
     */
    public ?string $schedule_sat;
    
    /**
     * @var null|string Режим работы в воскресенье
     */
    public ?string $schedule_sun;
}