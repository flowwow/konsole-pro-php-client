<?php

namespace Flowwow\KonsolPro\Response;

/**
 * DTO-объект для ответа v2/nominal_account/statement
 */
class ResponseV2NominalAccountStatements extends BaseResponse
{
    public int     $id;
    public string  $date_from;
    public string  $date_to;
    public string  $format;
    public string  $status;
    public ?string $url = null;
}
