<?php

namespace Flowwow\KonsolPro\Request;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * DTO-объект для запроса v2/nominal_account/statement
 */
class RequestV2NominalAccountStatements extends DataTransferObject
{
    public string $dateFrom;
    public string $dateTo;
    public string $format;

    /**
     * Подготовленный массив для запроса
     * @return array
     */
    public function preparedArray(): array
    {
        return [
            'date_from' => $this->dateFrom,
            'date_to'   => $this->dateTo,
            'format'    => $this->format,
        ];
    }
}
