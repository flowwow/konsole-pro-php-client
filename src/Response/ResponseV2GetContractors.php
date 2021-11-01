<?php

namespace Flowwow\KonsolPro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/contractors
 */
class ResponseV2GetContractors extends BaseResponse
{
    /** @var \Flowwow\KonsolPro\Response\Contractor[] */
    public array $contractors;

    /**
     * @inheritdoc
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data = self::getDataByResponse($response);

        return new self(['contractors' => $data]);
    }
}
