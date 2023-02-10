<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Act extends FlexibleDataTransferObject
{
    public int     $id;
    public string  $title;
    public string  $amount;
    public int     $contractor_id;
    public string  $start_date;
    public string  $end_date;
    public ?string $outer_id = null;
    /** @var string|int */
    public         $number;
    public array   $contract;
    public int     $created;
    public array   $contractor;
    public string  $status;
    public string  $date;
    public ?int    $jobs_count = null;
    public ?string $jobs_type  = null;
    public ?array  $receipt;
    public ?array  $bundle;
    public ?array  $payment;
    public string  $url;
}
