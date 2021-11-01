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

    /** @var \Flowwow\KonsolPro\Response\ScenarioField[] */
    public array $template_fields;
}
