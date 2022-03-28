<?php

namespace AlexBklnv\DaData;

use AlexBklnv\DaData\DTO\Profile\Balance;
use AlexBklnv\DaData\DTO\Profile\Relevance;
use AlexBklnv\DaData\DTO\Profile\Statistic;
use Carbon\Carbon;
use ClassTransformer\ClassTransformer;
use DateTime;
use PhpDaData\DaDataProfile;

class DaDataProfileService extends AbstractDaDataService
{
    
    protected DaDataProfile $service;
    
    public function __construct()
    {
        parent::__construct();
        $this->service = new DaDataProfile($this->token, $this->secret);
    }
    
    /**
     * Даты актуальности справочников.
     * Возвращает даты актуальности справочников (ФИАС, ЕГРЮЛ, банки и другие).
     *
     * @return Relevance
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/version/
     */
    public function getRelevance(): Relevance
    {
        $result = $this->service->getRelevance();
        return ClassTransformer::transform(Relevance::class, $result);
    }
    
    /**
     * Статистика использования.
     * Возвращает агрегированную статистику за конкретный день по каждому из сервисов: стандартизация, подсказки, поиск дублей.
     *
     * @param null|string|\Carbon\Carbon|DateTime  $date  Дата формата Y-m-d
     *
     * @return Statistic
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/stat/
     */
    public function getStat($date = null): Statistic
    {
        if ($date instanceof Carbon) {
            $stringDate = $date->format('Y-m-d');
        } elseif ($date instanceof DateTime) {
            $stringDate = $date->format('Y-m-d');
        } else {
            $stringDate = $date;
        }
        
        $result = $this->service->getStat($stringDate);
        return ClassTransformer::transform(Statistic::class, $result);
    }
    
    /**
     * Баланс пользователя.
     * Возвращает текущий баланс вашего счета.
     *
     * @return Balance
     * @throws \ClassTransformer\Exceptions\ClassNotFoundException
     * @throws \JsonException
     * @throws \PhpDaData\Exceptions\DaDataRequestException
     * @throws \ReflectionException
     * @link https://dadata.ru/api/balance/
     */
    public function getBalance(): Balance
    {
        $result = $this->service->getBalance();
        return ClassTransformer::transform(Balance::class, $result);
    }
}
