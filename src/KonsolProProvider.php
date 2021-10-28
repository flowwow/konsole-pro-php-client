<?php

namespace Flowwow\ConsolePro;

use Flowwow\ConsolePro\Enum\KonsolProMethodsEnum;
use Flowwow\ConsolePro\Exception\KonsolProException;
use Flowwow\ConsolePro\Request\RequestV2ContractorInvites;
use Flowwow\ConsolePro\Response\ResponseV2ContractorInvites;
use Flowwow\ConsolePro\Response\ResponseV2ContractorInvitesScenarios;
use Flowwow\ConsolePro\Response\ResponseV2GetDocuments;

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
     * Создание нового приглашения
     * @param RequestV2ContractorInvites $requestData
     * @return ResponseV2ContractorInvites
     * @throws KonsolProException
     */
    public function createContractorInvite(RequestV2ContractorInvites $requestData): ResponseV2ContractorInvites
    {
        $response = $this->client->request(
            KonsolProClient::POST_METHOD,
            KonsolProMethodsEnum::V2_CONTRACTOR_INVITES,
            $requestData->preparedArray()
        );

        return ResponseV2ContractorInvites::fromResponse($response);
    }

    /**
     * Запросить сценарии
     * @return ResponseV2ContractorInvitesScenarios
     * @throws KonsolProException
     */
    public function getContractorInvitesScenarios(): ResponseV2ContractorInvitesScenarios
    {
        $response = $this->client->request(
            KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_CONTRACTOR_INVITES_SCENARIOS
        );

        return ResponseV2ContractorInvitesScenarios::fromResponse($response);
    }

    /**
     * Запросить все документы
     * @param int $page
     * @return ResponseV2GetDocuments
     * @throws KonsolProException
     */
    public function getDocuments(int $page = 1): ResponseV2GetDocuments
    {
        $response = $this->client->request(
            KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_DOCUMENTS,
            [],
            ['page' => $page]
        );

        return ResponseV2GetDocuments::fromResponse($response);
    }
}
