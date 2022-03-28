<?php

namespace AlexBklnv\DaData;

use AlexBklnv\DaData\DTO\Address\AddressClean;
use AlexBklnv\DaData\DTO\Address\AddressSuggest;
use AlexBklnv\DaData\DTO\Address\Cadastre;
use AlexBklnv\DaData\DTO\Address\Country;
use AlexBklnv\DaData\DTO\Address\FindAddress;
use AlexBklnv\DaData\DTO\Address\Geocode;
use AlexBklnv\DaData\DTO\Address\Geolocate;
use AlexBklnv\DaData\DTO\Address\IPLocate;
use AlexBklnv\DaData\DTO\Address\PostalUnit;
use ClassTransformer\ClassTransformer;
use PhpDaData\DaDataAddress;

class DaDataAddressService extends AbstractDaDataService
{
    protected DaDataAddress $service;
    
    public function __construct()
    {
        parent::__construct();
        $this->service = new DaDataAddress($this->token, $this->secret);
    }
    
    /**
     * Разбор адреса из строки («стандартизация»)
     * Разбивает адрес из строки по отдельным полям (регион, город, улица, дом, квартира) согласно КЛАДР/ФИАС. Определяет почтовый индекс, часовой пояс,
     * ближайшее метро, координаты, стоимость квартиры и другую информацию об адресе.
     *
     * @param string  $address  Адрес
     *
     * @return null|array
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @throws \JsonException
     * @link https://dadata.ru/api/clean/address/
     */
    public function cleanAddress(string $address): ?AddressClean
    {
        $result = $this->service->cleanAddress($address)[0] ?? [];
        return ClassTransformer::transform(AddressClean::class, $result);
    }
    
    /**
     * Автодополнение при вводе («подсказки»)
     * Ищет адреса по любой части адреса от региона до квартиры («самара авроры 7 12» → «443017, Самарская обл, г Самара, ул Авроры, д 7, кв 12»).
     * Также ищет по почтовому индексу («105568» → «г Москва, ул Магнитогорская»).
     *
     * @param string  $address  Адрес
     * @param int  $count  Количество результатов (максимум — 20)
     *
     * @return array<AddressSuggest>
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @throws \JsonException
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @link https://dadata.ru/api/suggest/address/
     */
    public function suggestAddress(string $address, int $count = 10): array
    {
        $suggestions = $this->service->suggestAddress($address, $count)['suggestions'] ?? [];
        return ClassTransformer::transform([AddressSuggest::class], $suggestions);
    }
    
    /**
     * Геокодирование (координаты по адресу)
     * Определяет координаты адреса (дома, улицы, города)
     *
     * @param string  $address  Адрес
     *
     * @return Geocode
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/geocode/
     */
    public function geocodeAddress(string $address): Geocode
    {
        $result = $this->service->geocodeAddress($address)[0] ?? [];
        return ClassTransformer::transform(Geocode::class, $result);
    }
    
    /**
     * Обратное геокодирование (адрес по координатам)
     * Находит ближайшие адреса (дома, улицы, города) по географическим координатам
     *
     * @param string  $lat  Географическая широта
     * @param string  $lon  Географическая долгота
     * @param int  $radiusMeters  Радиус поиска в метрах (максимум – 1000)
     * @param int  $count  Количество результатов (максимум — 20)
     *
     * @return array<Geolocate>
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \JsonException
     * @throws \ReflectionException
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @link https://dadata.ru/api/geolocate/
     */
    public function geolocate(string $lat, string $lon, int $radiusMeters = 100, int $count = 10): array
    {
        $result = $this->service->geolocate($lat, $lon, $radiusMeters, $count)['suggestions'] ?? [];
        return ClassTransformer::transform([Geolocate::class], $result);
    }
    
    /**
     * Город по IP-адресу
     *
     * @param string  $ip
     *
     * @return IPLocate
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \JsonException
     * @throws \ReflectionException
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @link https://dadata.ru/api/iplocate/
     */
    public function iplocate(string $ip): IPLocate
    {
        $result = $this->service->iplocate($ip)['location'] ?? [];
        return ClassTransformer::transform(IPLocate::class, $result);
    }
    
    /**
     * Поиск адреса по коду КЛАДР или ФИАС
     *
     * @param string  $code  Код КЛАДР или ФИАС
     * @param int  $count  Количество результатов (максимум — 20)
     *
     * @return array<FindAddress>
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/find-address/
     */
    public function findByCode(string $code, int $count = 10): array
    {
        $result = $this->service->findByCode($code, $count)['suggestions'] ?? [];
        return ClassTransformer::transform([FindAddress::class], $result);
    }
    
    /**
     * Кадастровый номер по КЛАДР или ФИАС.
     * Находит кадастровый номер дома, квартиры или земельного участка по ФИАС-коду
     *
     * @param string  $code  Код КЛАДР или ФИАС
     * @param int  $count  Количество результатов (максимум — 20)
     *
     * @return array<Cadastre>
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/cadastre/
     */
    public function findByCadastre(string $code, int $count = 10): array
    {
        $result = $this->service->findByCadastre($code, $count)['suggestions'] ?? [];
        return ClassTransformer::transform([Cadastre::class], $result);
    }
    
    /**
     * Поиск отделений Почта России
     *
     * @param string  $address
     *
     * @return array
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/suggest/postal_unit/
     */
    public function findPostUnit(string $address): array
    {
        $result = $this->service->findPostUnit($address)['suggestions'] ?? [];
        return ClassTransformer::transform([PostalUnit::class], $result);
    }
    
    /**
     * Поиск стран
     * Справочник стран мира по стандарту ISO 3166
     *
     * @param string  $country
     *
     * @return array<Country>
     *
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/suggest/country/
     */
    public function suggestCountry(string $country): array
    {
        $result = $this->service->suggestCountry($country)['suggestions'] ?? [];
        return ClassTransformer::transform([Country::class], $result);
    }
}
