<?php

namespace Flowwow\ConsolePro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/contractor_invites
 */
class ResponseV2ContractorInvites extends BaseResponse
{
    public int    $id;
    public string $name;
    public string $phone;
    public string $scenarioId;
    public string $status;
    public bool   $cancelled;
    public int    $created;
    public int    $updated;
    public array  $templateFields;
    public int    $contractorId;

    /**
     * @inheritdoc
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data                        = self::getDataByResponse($response);
        $responseDto                 = new self();
        $responseDto->id             = $data['id'];
        $responseDto->name           = $data['name'];
        $responseDto->phone          = $data['phone'];
        $responseDto->scenarioId     = $data['scenario_id'];
        $responseDto->status         = $data['status'];
        $responseDto->cancelled      = $data['cancelled'];
        $responseDto->created        = $data['created'];
        $responseDto->updated        = $data['updated'];
        $responseDto->templateFields = $data['template_fields'];
        $responseDto->contractorId   = $data['contractor_id'];

        return $responseDto;
    }
}
