<?php

namespace Flowwow\ConsolePro\Request;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * DTO-объект для запроса v2/contractor_invites
 */
class RequestV2ContractorInvites extends DataTransferObject
{
    public string $name;
    public string $phone;
    public string $scenarioId;
    public array  $templateFields;

    /**
     * Подготовленный массив для запроса
     * @return array
     */
    public function preparedArray(): array
    {
        return [
            'name'            => $this->name,
            'phone'           => $this->phone,
            'scenario_id'     => $this->scenarioId,
            'template_fields' => $this->templateFields,
        ];
    }
}
