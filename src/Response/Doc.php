<?php

namespace Flowwow\ConsolePro\Response;

use Spatie\DataTransferObject\DataTransferObject;

class Doc extends DataTransferObject
{
    public int    $id;
    public string $status;
    public string $title;
    public string $date;
    public int    $contractorId;
    public ?int   $contractId = null;
    public string $kind;
    public int    $templateId;
    public int    $number;
    public string $url;
    public array  $data;
    public int    $created;
}
