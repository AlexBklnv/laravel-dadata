<?php

namespace Tests;

use AlexBklnv\DaData\DTO\Address\AddressClean;
use AlexBklnv\DaData\DTO\Address\AddressSuggest;
use AlexBklnv\DaData\DTO\Address\Country;
use AlexBklnv\DaData\DTO\Address\Geocode;
use AlexBklnv\DaData\DTO\Address\IPLocate;
use AlexBklnv\DaData\DTO\Address\PostalUnit;
use AlexBklnv\DaData\Facades\DaDataAddress;
use PhpDaData\Exceptions\DaDataRequestException;

class DaDataAddressTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function cleanAddress(): void
    {
        $result = DaDataAddress::cleanAddress('мск сухонска 11/-89');
        self::assertInstanceOf(AddressClean::class, $result);
        self::assertNotEmpty($result->source);
    }
    
    /**
     * @test
     * @return void
     */
    public function suggestAddress(): void
    {
        $result = DaDataAddress::suggestAddress('г Москва, ул Снежная');
        self::assertIsArray($result);
        self::assertInstanceOf(AddressSuggest::class, $result[0]);
        self::assertNotEmpty($result[0]->value);
    }
    
    /**
     * @test
     * @return void
     */
    public function geocodeAddress(): void
    {
        $result = DaDataAddress::geocodeAddress('г Москва, ул Сухонская');
        self::assertInstanceOf(Geocode::class, $result);
        self::assertNotEmpty($result->source);
    }
    
    /**
     * @test
     * @return void
     */
    public function geolocate(): void
    {
        $result = DaDataAddress::geolocate(55.872127, 37.651223, 100, 2);
        self::assertIsArray($result);
        self::assertInstanceOf(AddressSuggest::class, $result[0]);
        self::assertNotEmpty($result[0]->value);
    }
    
    /**
     * @test
     * @return void
     */
    public function iplocate(): void
    {
        $result = DaDataAddress::iplocate('2.93.1.0');
        self::assertInstanceOf(IPLocate::class, $result);
        self::assertNotEmpty($result->value);
    }
    
    /**
     * @test
     * @return void
     */
    public function findByCode(): void
    {
        $result = DaDataAddress::findByCode('9120b43f-2fae-4838-a144-85e43c2bfb29');
        self::assertIsArray($result);
        self::assertInstanceOf(AddressSuggest::class, $result[0]);
        self::assertNotEmpty($result[0]->value);
    }
    
    /**
     * @test
     * @return void
     */
    public function findByCadastre(): void
    {
        // Только платные запросы, могут вылезти ошибки запроса
        $this->expectException(DaDataRequestException::class);
        $this->expectExceptionCode(403);
        
        $result = DaDataAddress::findByCadastre('f26b876b-6857-4951-b060-ec6559f04a9a');
        self::assertIsArray($result);
        self::assertInstanceOf(AddressSuggest::class, $result[0]);
        self::assertNotEmpty($result[0]->value);
    }
    
    /**
     * @test
     * @return void
     */
    public function findPostUnit(): void
    {
        $result = DaDataAddress::findPostUnit('дежнева 2а');
        self::assertIsArray($result);
        self::assertInstanceOf(PostalUnit::class, $result[0]);
        self::assertNotEmpty($result[0]->unrestricted_value);
    }
    
    /**
     * @test
     * @return void
     */
    public function suggestCountry(): void
    {
        $result = DaDataAddress::suggestCountry('Россия');
        self::assertIsArray($result);
        self::assertInstanceOf(Country::class, $result[0]);
        self::assertNotEmpty($result[0]->unrestricted_value);
    }
}