<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Doc extends FlexibleDataTransferObject
{
    public int     $id;
    public string  $status;
    public string  $title;
    public ?string $date        = null;
    public int     $contractor_id;
    public ?int    $contract_id = null;
    public string  $kind;
    public ?string $require_sign = null;
    public ?int    $template_id = null;
    public         $number;
    public string  $url;
    public array   $data;
    public int     $created;
    public ?int    $outer_id = null;
}
