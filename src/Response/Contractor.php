<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Contractor extends FlexibleDataTransferObject
{
    public int     $id;
    public int     $created;
    public string  $first_name;
    public string  $last_name;
    public string  $patronymic;
    public string  $citizenship;
    public ?string $sex                     = null;
    public ?string $phone                   = null;
    public ?string $email                   = null;
    public string  $inn;
    public string  $kind;
    public bool    $suspended;
    public array   $contracts;
    public array   $id_cards;
    public ?string $moi_nalog_status        = null;
    public ?string $ogrnip                  = null;
    public ?string $nalog_registration_time = null;
    public ?array  $bank_details            = null;
}
