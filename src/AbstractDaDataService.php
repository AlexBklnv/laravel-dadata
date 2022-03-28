<?php

namespace AlexBklnv\DaData;

use Illuminate\Support\Facades\Config;

/**
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
abstract class AbstractDaDataService
{
    /**
     * @var string|null
     */
    protected ?string $token;
    
    /**
     * @var string|null
     */
    protected ?string $secret;
    
    public function __construct()
    {
        $this->token = Config::get('dadata.token');
        $this->secret = Config::get('dadata.secret');
    }
    
    /**
     * @return null|string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }
    
    /**
     * @return null|string
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }
}