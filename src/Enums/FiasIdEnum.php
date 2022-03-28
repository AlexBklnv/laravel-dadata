<?php

namespace AlexBklnv\DaData\Enums;

/**
 * ФИАС-код адреса (идентификатор ФИАС)
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class FiasIdEnum
{
    /**
     * @var string Eсли квартира найдена в ФИАС
     */
    public const ROOM = 'ROOM.ROOMGUID';
    
    /**
     * @var string Eсли дом найден в ФИАС
     */
    public const HOUSE = 'HOUSE.HOUSEGUID';
    
    /**
     * @var string в противном случае
     */
    public const UNKNOWN = 'ADDROBJ.AOGUID';
}