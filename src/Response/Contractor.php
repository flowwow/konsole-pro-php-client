<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\DataTransferObject;

class Contractor extends DataTransferObject
{
    public int    $id;
    public string $first_name;
    public string $last_name;
    public string $phone;
    public string $email;
    public string $inn;
    public string $kind;
    public bool   $suspended;
    public array  $contracts;
    public array  $id_cards;
    public string $moi_nalog_status;
    public array  $bank_details;
}
