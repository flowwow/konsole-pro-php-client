<?php

namespace Flowwow\KonsolPro;

use Flowwow\KonsolPro\Enum\KonsolProMethodsEnum;
use Flowwow\KonsolPro\Exception\KonsolProException;
use Flowwow\KonsolPro\Request\RequestContractByPhone;
use Flowwow\KonsolPro\Request\RequestV2ContractorInvites;
use Flowwow\KonsolPro\Request\RequestV2GetActs;
use Flowwow\KonsolPro\Request\RequestV2NominalAccountStatements;
use Flowwow\KonsolPro\Response\ResponseV2ContractorInvites;
use Flowwow\KonsolPro\Response\ResponseV2ContractorInvitesScenarios;
use Flowwow\KonsolPro\Response\ResponseV2GetActs;
use Flowwow\KonsolPro\Response\ResponseV2GetContractors;
use Flowwow\KonsolPro\Response\ResponseV2GetDocuments;
use Flowwow\KonsolPro\Response\ResponseV2NominalAccountStatements;

class KonsolProProvider
{
    /** Клиент Консоль.Про */
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
     * @param int $perPage Кол-во документов на странице
     * @return ResponseV2GetDocuments
     * @throws KonsolProException
     * @see https://konsol.readme.io/reference/documents-all
     */
    public function getDocuments(int $page = 1, int $perPage = 15): ResponseV2GetDocuments
    {
        $response = $this->client->request(
            KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_DOCUMENTS,
            [],
            ['page' => $page, 'per' => $perPage]
        );

        return ResponseV2GetDocuments::fromResponse($response);
    }

    /**
     * Запросить всех исполнителей
     * @param int $page
     * @return ResponseV2GetContractors
     * @throws KonsolProException
     */
    public function getContractors(int $page = 1): ResponseV2GetContractors
    {
        $response = $this->client->request(
            KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_CONTRACTORS,
            [],
            ['page' => $page]
        );

        return ResponseV2GetContractors::fromResponse($response);
    }

    /**
     * Запросить всех исполнителей по телефону
     * @param RequestContractByPhone $request
     * @return ResponseV2GetContractors
     * @throws KonsolProException
     */
    public function getContractorsByPhones(RequestContractByPhone $request): ResponseV2GetContractors
    {
        $response = $this->client->request(KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_CONTRACTORS,
            [],
            $request->preparedArray()
        );

        return ResponseV2GetContractors::fromResponse($response);
    }

    /**
     * Запросить все акты
     * @param int $page
     * @param RequestV2GetActs|null $search
     * @return ResponseV2GetActs
     * @throws KonsolProException
     */
    public function getActs(int $page = 1, ?RequestV2GetActs $search = null): ResponseV2GetActs
    {
        $searchParams = $search ? $search->preparedArray() : [];
        $response     = $this->client->request(
            KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_ACTS,
            [],
            ['page' => $page] + $searchParams
        );

        return ResponseV2GetActs::fromResponse($response);
    }

    /**
     * Удалить акт
     * @param int $actId
     * @throws KonsolProException
     */
    public function removeAct(int $actId): void
    {
        $this->client->request(KonsolProClient::DELETE_METHOD, KonsolProMethodsEnum::V2_ACTS . "/{$actId}");
    }

    /**
     * Запросить выписку
     * @param RequestV2NominalAccountStatements $requestData
     * @return ResponseV2NominalAccountStatements
     * @throws KonsolProException
     */
    public function requestStatements(RequestV2NominalAccountStatements $requestData
    ): ResponseV2NominalAccountStatements {
        $response =
            $this->client->request(KonsolProClient::POST_METHOD, KonsolProMethodsEnum::V2_NOMINAL_ACCOUNT_STATEMENTS,
                $requestData->preparedArray());

        return ResponseV2NominalAccountStatements::fromResponse($response);
    }

    /**
     * Запросить выписку
     * @param int $statementId
     * @return ResponseV2NominalAccountStatements
     * @throws KonsolProException
     */
    public function getStatement(int $statementId): ResponseV2NominalAccountStatements
    {
        $response = $this->client->request(KonsolProClient::GET_METHOD,
            KonsolProMethodsEnum::V2_NOMINAL_ACCOUNT_STATEMENTS . "/$statementId");

        return ResponseV2NominalAccountStatements::fromResponse($response);
    }

    /**
     * Подгрузка контента выписки
     * @param string $url
     * @return string
     * @throws KonsolProException
     */
    public function getStatementContent(string $url): string
    {
        $response = $this->client->request(KonsolProClient::GET_METHOD, $url);

        return $response->getBody()->getContents();
    }
}
