<?php

namespace Flowwow\ConsolePro\Response;

use Spatie\DataTransferObject\DataTransferObject;

class ScenarioField extends DataTransferObject
{
    public bool $required;
    public string $key;
    public string $name;
    public string $type;
}
