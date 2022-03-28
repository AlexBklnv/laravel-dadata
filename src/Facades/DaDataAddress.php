<?php

namespace AlexBklnv\DaData\Facades;

use AlexBklnv\DaData\DTO\Address\AddressClean;
use AlexBklnv\DaData\DTO\Address\Cadastre;
use AlexBklnv\DaData\DTO\Address\Country;
use AlexBklnv\DaData\DTO\Address\Geocode;
use AlexBklnv\DaData\DTO\Address\IPLocate;
use Illuminate\Support\Facades\Facade;

/**
 * @method static AddressClean cleanAddress(string $address)
 * @method static array suggestAddress(string $address, int $count = 10)
 * @method static Geocode geocodeAddress(string $address)
 * @method static array geolocate(string $lat, string $lon, int $radiusMeters = 100, int $count = 10)
 * @method static IPLocate iplocate(string $ip)
 * @method static array findByCode(string $code, int $count = 10)
 * @method static array findByCadastre(string $code, int $count = 10)
 * @method static array findPostUnit(string $address)
 * @method static array suggestCountry(string $country)
 *
 * @author AlexBklnv <alexbklnv@yandex.ru>
 * @see \AlexBklnv\DaData\DaDataAddressService
 */
class DaDataAddress extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return self::class;
    }
}
