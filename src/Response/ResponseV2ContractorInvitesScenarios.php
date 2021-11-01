<?php

namespace Flowwow\KonsolPro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/contractor_invites/scenarios
 */
class ResponseV2ContractorInvitesScenarios extends BaseResponse
{
    public string $id;
    public string $name;

    /** @var ScenarioField[] */
    public array $templateFields;

    /**
     * @inheritdoc
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $data                        = self::getDataByResponse($response);
        $responseDto                 = new self();
        $responseDto->id             = $data['id'];
        $responseDto->name           = $data['name'];

        $fields = [];
        foreach ($data['template_fields'] as $field) {
            $fields[] = new ScenarioField($field);
        }
        $responseDto->templateFields = $fields;

        return $responseDto;
    }
}
