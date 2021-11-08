<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\DataTransferObject;

class Doc extends DataTransferObject
{
    public int    $id;
    public string $status;
    public string $title;
    public string $date;
    public int    $contractor_id;
    public ?int   $contract_id = null;
    public string $kind;
    public ?int   $template_id = null;
    public        $number;
    public string $url;
    public array  $data;
    public int    $created;
}
