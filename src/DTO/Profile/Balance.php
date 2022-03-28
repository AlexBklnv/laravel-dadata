<?php

namespace AlexBklnv\DaData\DTO\Profile;

use AlexBklnv\DaData\DTO\AbstractDTO;

/**
 * DTO Баланс пользователя
 *
 * @package AlexBklnv\Dadata
 * @author AlexBklnv <alexbklnv@yandex.ru>
 */
class Balance extends AbstractDTO
{
    /**
     * @var null|string Баланс
     */
    public ?string $balance;
}