<?php

namespace Flowwow\KonsolPro\Response;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class ScenarioField extends FlexibleDataTransferObject
{
    public bool   $required;
    public string $key;
    public string $name;
    public string $type;
}
