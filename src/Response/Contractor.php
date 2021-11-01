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
    public int    $created;
    public bool   $suspended;
    public array  $contracts;
    public array  $passport;
    public array  $bank_details;
}
