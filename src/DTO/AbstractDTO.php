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
        return (array)$this->objectToArray($this);
    }
    
    /**
     * @param $data
     *
     * @return array|mixed
     */
    private function objectToArray($data)
    {
        if (is_array($data) || is_object($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $result[$key] = $this->objectToArray($value);
            }
            return $result;
        }
        return $data;
    }
}