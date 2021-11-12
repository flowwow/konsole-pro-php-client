<?php

namespace Flowwow\KonsolPro\Response;

use Flowwow\KonsolPro\Exception\KonsolProException;
use Psr\Http\Message\ResponseInterface;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * DTO-объект для ответа api/latest.json
 */
class BaseResponse extends DataTransferObject
{
    /**
     * Возвращает Response Dto, на основе http response
     * @param ResponseInterface $response
     * @return static
     * @throws KonsolProException
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data = self::getDataByResponse($response);

        return new static($data);
    }

    /**
     * Парсинг ответа
     * @param ResponseInterface $response
     * @return array
     * @throws KonsolProException
     */
    public static function getDataByResponse(ResponseInterface $response): array
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new KonsolProException(static::class . ', json parse error');
        }

        return $data;
    }
}
