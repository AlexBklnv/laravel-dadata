<?php

namespace Tests;

use AlexBklnv\DaData\DTO\Profile\Balance;
use AlexBklnv\DaData\DTO\Profile\Relevance;
use AlexBklnv\DaData\DTO\Profile\Statistic;
use AlexBklnv\DaData\Facades\DaDataProfile;

class DaDataProfileTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function getRelevance(): void
    {
        $result = DaDataProfile::getRelevance();
        self::assertInstanceOf(Relevance::class, $result);
        self::assertNotEmpty($result->dadata);
        self::assertNotEmpty($result->factor);
        self::assertNotEmpty($result->suggestions);
    }
    
    /**
     * @test
     * @return void
     */
    public function getStat(): void
    {
        $result = DaDataProfile::getStat();
        self::assertInstanceOf(Statistic::class, $result);
        self::assertNotEmpty($result->date);
        self::assertNotEmpty($result->services);
        self::assertArrayHasKey('clean', $result->services);
        self::assertArrayHasKey('suggestions', $result->services);
        self::assertArrayHasKey('merging', $result->services);
    }
    
    /**
     * @test
     * @return void
     */
    public function getBalance(): void
    {
        $result = DaDataProfile::getBalance();
        self::assertInstanceOf(Balance::class, $result);
        self::assertNotNull($result->balance);
    }
}