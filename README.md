## Laravel package for API DaData via [php-dadata-client](https://github.com/AlexBklnv/php-dadata-client)

![Packagist Version](https://img.shields.io/packagist/v/alexbklnv/laravel-dadata?color=blue)
![License](https://img.shields.io/github/license/alexbklnv/laravel-dadata)
![Packagist Downloads](https://img.shields.io/packagist/dm/alexbklnv/laravel-dadatat)
![Packagist Downloads](https://img.shields.io/packagist/dt/alexbklnv/laravel-dadata)

## :scroll: **Installation**

Установка пакета:

```
composer require alexbklnv/laravel-dadata
```

---
Опубликовать конфиг:

```bash
php artisan vendor:publish --provider="AlexBklnv\DaData\DaDataServiceProvider"
```

Задать токен (и ключ для API стандартизации) в `config/dadata.php` или `.env`

```php
    'token' => env('DADATA_TOKEN', ''),
    'secret' => env('DADATA_SECRET', ''),
```

## :scroll: **Usage**

1. Работа с адресами и геокоординатами.

+ [Разбор адреса из строки («стандартизация»)](#CleanAddress)
+ [Автодополнение адреса при вводе («подсказки»)](#SuggestAddress)
+ [Геокодирование (координаты по адресу)](#geocode)
+ [Обратное геокодирование (адрес по координатам)](#geolocate)
+ [Город по IP-адресу](#iplocate)
+ [Поиск адреса по коду КЛАДР или ФИАС](#findAddress)
+ [Кадастровый номер](#cadastre)
+ [Ближайшее почтовое отделение](#postalUnit)
+ [Поиск стран](#country)

2. Работа с профилем пользователя

+ [Проверка баланса](#Balance)
+ [Получение статистики](#Stat)
+ [Справка по актуальности справочников](#Relevance)

## Работа с почтовыми адресами и геокоординатами.

Необходимо использовать следующий фасад:

```php
use AlexBklnv\DaData\Facades\DaDataAddress;
```

#### <a name="CleanAddress"></a>Разбор адреса из строки («стандартизация») [(Документация)](https://dadata.ru/api/clean/address/)

```php
$result = DaDataAddress::cleanAddress('мск сухонска 11/-89');
```

#### <a name="SuggestAddress"></a>Подсказки по адресам [(Документация)](https://dadata.ru/api/suggest/address/)

```php
$result = DaDataAddress->suggestAddress('москва хабар');
```

#### <a name="geocode"></a>Геокодирование (координаты по адресу) [(Документация)](https://dadata.ru/api/geocode/)

```php
$result = DaDataAddress::geocodeAddress('москва сухонская 11');
```

#### <a name="geolocate"></a>Обратное геокодирование (адрес по координатам) [(Документация)](https://dadata.ru/api/geolocate/)

```php
$result = DaDataAddress::geolocate('55.87', '37.653');
```

#### <a name="iplocate"></a>Город по IP-адресу [(Документация)](https://dadata.ru/api/iplocate/)

```php
$result = DaDataAddress::iplocate('46.226.227.20');
```

#### <a name="findAddress"></a>Поиск адреса по коду КЛАДР или ФИАС [(Документация)](https://dadata.ru/api/find-address/)

```php
$result = DaDataAddress::findByCode('9120b43f-2fae-4838-a144-85e43c2bfb29');
```

#### <a name="cadastre"></a>Кадастровый номер по КЛАДР или ФИАС [(Документация)](https://dadata.ru/api/cadastre/)

```php
$result = DaDataAddress::findByCadastre('9120b43f-2fae-4838-a144-85e43c2bfb29');
```

#### <a name="postalUnit"></a>Поиск отделений Почта России [(Документация)](https://dadata.ru/api/suggest/postal_unit/)

```php
$result = DaDataAddress::findPostUnit('дежнева 2а');
```

#### <a name="country"></a>Поиск стран [(Документация)](https://dadata.ru/api/suggest/country/)

```php
$result = DaDataAddress::suggestCountry('та');
```

## Работа с профилем пользователя

Необходимо использовать следующий фасад:

```php
use AlexBklnv\DaData\Facades\DaDataProfile;
```

#### <a name="Balance"></a>Проверка баланса [(Документация)](https://dadata.ru/api/balance/)

```php
$result = DaDataProfile::getBalance();
```

#### <a name="Stat"></a>Получение статистики [(Документация)](https://dadata.ru/api/stat/)

На текущий день:

```php
$result = DaDataProfile::getStat();
```

На любую другую дату:

```php
$result = DaDataProfile::getStat('2019-11-01');
$result = DaDataProfile::getStat(new DateTime());
$result = DaDataProfile::getStat(\Carbon\Carbon::create('2014', '12', '12'));
```

#### <a name="Relevance"></a>Справка по актуальности справочников [(Документация)](https://dadata.ru/api/version/)

```php
$result = DaDataProfile::getRelevance();
```