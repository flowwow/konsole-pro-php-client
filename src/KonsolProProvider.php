<?php

namespace Flowwow\ConsolePro;

use Flowwow\ConsolePro\Enum\KonsolProMethodsEnum;
use Flowwow\ConsolePro\Exception\KonsolProException;
use Flowwow\ConsolePro\Request\RequestV2ContractorInvites;
use Flowwow\ConsolePro\Response\ResponseV2ContractorInvites;

class KonsolProProvider
{
    private KonsolProClient $client;

    /**
     * @param string $token
     * @param float $timeout
     */
    public function __construct(string $token, float $timeout)
    {
        $this->client = new KonsolProClient($token, $timeout);
    }

    /**
     * @param array $fields
     * @return ResponseV2ContractorInvites
     * @throws KonsolProException
     */
    public function contractorInvites(RequestV2ContractorInvites $requestData): ResponseV2ContractorInvites
    {
        $response = $this->client->request(
            KonsolProClient::POST_METHOD,
            KonsolProMethodsEnum::V2_CONTRACTOR_INVITES,
            $requestData->preparedArray()
        );

        return ResponseV2ContractorInvites::fromResponse($response);
    }
}
