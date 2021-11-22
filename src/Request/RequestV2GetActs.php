<?php

namespace Flowwow\KonsolPro\Request;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * DTO-объект для запроса v2/acts
 */
class RequestV2GetActs extends DataTransferObject
{
    public ?string $outer_id = null;
    public ?string $ids = null;
    public ?string $inn = null;
    public ?string $phone = null;
    public ?string $date = null;
    public ?string $date_from = null;
    public ?string $date_to = null;

    /**
     * Подготовленный массив для запроса
     * @return array
     */
    public function preparedArray(): array
    {
        $fields = $this->toArray();
        $result = [];
        foreach ($fields as $field => $value) {
            if (!is_null($value)) {
                $result[$field] = $value;
            }
        }

        return  $result;
    }
}
