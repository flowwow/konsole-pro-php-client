<?php

namespace Flowwow\ConsolePro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/documents
 */
class ResponseV2GetDocuments extends BaseResponse
{
    /** @var Doc[] */
    public array $docs;

    /**
     * @inheritdoc
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data        = self::getDataByResponse($response);
        $responseDto = new self();

        $docs = [];
        foreach ($data as $docData) {
            $docs[] = new Doc([
                'id'           => $docData['id'],
                'status'       => $docData['status'],
                'title'        => $docData['title'],
                'date'         => $docData['date'],
                'contractorId' => $docData['contractor_id'],
                'contractId'   => $docData['contract_id'],
                'kind'         => $docData['kind'],
                'templateId'   => $docData['template_id'],
                'number'       => $docData['number'],
                'url'          => $docData['url'],
                'data'         => $docData['data'],
                'created'      => $docData['created'],
            ]);
        }
        $responseDto->docs = $docs;

        return $responseDto;
    }
}
