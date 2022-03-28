<?php

namespace AlexBklnv\DaData\Enums;

/**
 * Внутри кольцевой?
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class BeltwayHitEnum
{
    /**
     * @var string Внутри МКАД (Москва)
     */
    public const IN_MKAD = 'IN_MKAD';
    
    /**
     * @var string За МКАД (Москва или Московская область)
     */
    public const OUT_MKAD = 'OUT_MKAD';
    
    /**
     * @var string Внутри КАД (Санкт-Петербург)
     */
    public const IN_KAD = 'IN_KAD';
    
    /**
     * @var string За КАД (Санкт-Петербург или Ленинградская область)
     */
    public const OUT_KAD = 'OUT_KAD';
}