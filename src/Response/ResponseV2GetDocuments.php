<?php

namespace Flowwow\KonsolPro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/documents
 */
class ResponseV2GetDocuments extends BaseResponse
{
    /** @var \Flowwow\KonsolPro\Response\Doc[] */
    public array $docs;

    /**
     * @inheritdoc
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data = self::getDataByResponse($response);

        return new self(['docs' => $data]);
    }
}
