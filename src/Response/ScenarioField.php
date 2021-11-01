<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\DataTransferObject;

class ScenarioField extends DataTransferObject
{
    public bool   $required;
    public string $key;
    public string $name;
    public string $type;
}
