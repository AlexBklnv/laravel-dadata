<?php

namespace AlexBklnv\DaData\DTO;

/**
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
abstract class AbstractDTO
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array)$this;
    }
}