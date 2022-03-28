<?php

namespace AlexBklnv\DaData\Enums;

/**
 * Признак центра района или региона
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class CapitalMarkerEnum
{
    /**
     * @var string Центр района (Московская обл, Одинцовский р-н, г Одинцово)
     */
    public const AREA_CENTER = 1;
    
    /**
     * @var string Центр региона (Новосибирская обл, г Новосибирск)
     */
    public const REGION_CENTER = 2;
    
    /**
     * @var string Центр района и региона (Костромская обл, Костромской р-н, г Кострома)
     */
    public const AREA_AND_REGION_CENTER = 3;
    
    /**
     * @var string Центральный район региона (Тюменская обл, Тюменский р-н)
     */
    public const CENTRAL_AREA_OF_REGION = 4;
    
    /**
     * @var string Ни то, ни другое (Московская обл, г Балашиха).
     */
    public const NONE = 0;
}