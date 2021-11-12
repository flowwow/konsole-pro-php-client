<?php

namespace Flowwow\KonsolPro\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * DTO-объект для ответа v2/contractor_invites
 */
class ResponseV2ContractorInvites extends BaseResponse
{
    public int     $id;
    public string  $name;
    public string  $phone;
    public string  $scenario_id;
    public string  $status;
    public ?string $comment = null;
    public bool    $cancelled;
    public int     $created;
    public int     $updated;
    public array   $template_fields;
    public ?int    $contractor_id = null;
}
