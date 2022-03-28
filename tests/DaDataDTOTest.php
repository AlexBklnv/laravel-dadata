<?php

namespace Tests;

use AlexBklnv\DaData\DTO\Address\AddressClean;
use AlexBklnv\DaData\DTO\Address\AddressSuggest;
use AlexBklnv\DaData\DTO\Address\Cadastre;
use AlexBklnv\DaData\DTO\Address\Data\PostalUnitData;
use AlexBklnv\DaData\DTO\Address\Geocode;
use AlexBklnv\DaData\DTO\Address\Geolocate;
use AlexBklnv\DaData\DTO\Address\IPLocate;
use AlexBklnv\DaData\DTO\Address\PostalUnit;
use ClassTransformer\ClassTransformer;

class DaDataDTOTest extends TestCase
{
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function addressCleanDTO(): void
    {
        $data = $this->cleanAddressProvider()[0];
        $result = ClassTransformer::transform(AddressClean::class, $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(AddressClean::class, get_class($result));
        $this->ensureDTOObjectFilled($result, $data);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function addressSuggestDTO(): void
    {
        $data = $this->suggestionsAddressProvider()['suggestions'][0];
        $result = ClassTransformer::transform(AddressSuggest::class, $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(AddressSuggest::class, get_class($result));
        $this->ensureDTOObjectFilled($result, $data);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function cadastreDTO(): void
    {
        $data = $this->suggestionsAddressProvider()['suggestions'];
        $result = ClassTransformer::transform([Cadastre::class], $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(Cadastre::class, get_class($result[0]));
        $this->ensureDTOObjectFilled($result[0], $data[0]);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function findAddressDTO(): void
    {
        $data = $this->fiasAddressProvider()['suggestions'];
        $result = ClassTransformer::transform([Cadastre::class], $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(Cadastre::class, get_class($result[0]));
        $this->ensureDTOObjectFilled($result[0], $data[0]);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function geocodeDTO(): void
    {
        $data = $this->cleanAddressProvider()[0];
        $result = ClassTransformer::transform(Geocode::class, $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(Geocode::class, get_class($result));
        $this->ensureDTOObjectFilled($result, $data);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function geolocateDTO(): void
    {
        $data = $this->geoCoordinatesProvider();
        $result = ClassTransformer::transform(Geolocate::class, $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(Geolocate::class, get_class($result));
        $this->ensureDTOObjectFilled($result, $data);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function iplocateDTO(): void
    {
        $data = $this->ipv4AddressProvider()['location'];
        $result = ClassTransformer::transform(IPLocate::class, $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(IPLocate::class, get_class($result));
        $this->ensureDTOObjectFilled($result, $data);
    }
    
    /**
     * @test
     * @return void
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \ReflectionException
     */
    public function postalUnitDTO(): void
    {
        $data = $this->postalUnitByAddreessProvider()['suggestions'];
        $result = ClassTransformer::transform([PostalUnit::class], $data);
        self::assertNotNull($result);
        /** @noinspection GetClassUsageInspection */
        self::assertEquals(PostalUnit::class, get_class($result[0]));
        self::assertEquals(PostalUnitData::class, get_class($result[0]->data));
        $this->ensureDTOObjectFilled($result[0], $data[0]);
    }
    
    /**
     * Поскольку не все данные идут в дто + кастование типов в ДТО, то проверим только принятые поля без строгого сравнивания
     *
     * @param mixed  $result  DTO
     * @param mixed  $data  Данные с api
     *
     * @return void
     */
    private function ensureDTOObjectFilled($result, $data): void
    {
        foreach ($result as $k => $v) {
            if (is_array($data[$k])) {
                foreach ($v as $arrKey => $arrValue) {
                    self::assertEquals($data[$k][$arrKey], $arrValue);
                }
            } else {
                self::assertEquals($data[$k], $v);
            }
        }
    }
}