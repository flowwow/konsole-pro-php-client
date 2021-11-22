<?php

namespace Flowwow\KonsolPro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/acts
 */
class ResponseV2GetActs extends BaseResponse
{
    /** @var \Flowwow\KonsolPro\Response\Act[] */
    public array $acts;

    /**
     * @inheritdoc
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data = self::getDataByResponse($response);

        return new self(['acts' => $data]);
    }
}
