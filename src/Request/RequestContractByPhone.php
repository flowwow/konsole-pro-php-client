<?php


namespace Flowwow\KonsolPro\Request;

use Flowwow\KonsolPro\Exception\KonsolProException;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * DTO-объект для запроса v2/getContractorsByPhones
 */
class RequestContractByPhone extends DataTransferObject
{
    /** шаблон проверки номера */
    private string $phoneCheckPattern = '/^[0-9]{11,15}$/';
    /** Массив телефонов */
    public array   $phones = [];
    /** Пагинация запроса */
    public int     $page = 1;

    /**
     * Подготовленный массив для запроса
     * @return array
     * @throws KonsolProException
     */
    public function preparedArray(): array
    {
        $this->validatePhones();
        $preparedArray = [
            'page' => $this->page
        ];
        if ($this->phones) {
            $preparedArray['phone'] = implode(',', $this->phones);
        }

        return $preparedArray;
    }

    /**
     * Добавляем телефон в внутренний массив телефонов
     * @param string $phone
     * @return $this
     * @throws KonsolProException
     */
    public function addPhone(string $phone): RequestContractByPhone
    {
        $this->validatePhone($phone);
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * Валидируем весь массив телефонов
     * @throws KonsolProException
     */
    private function validatePhones()
    {
        foreach ($this->phones as $phone) {
            $this->validatePhone($phone);
        }
    }

    /**
     * Валидируем отдельный телефон
     * @param string $phone
     * @throws KonsolProException
     */
    private function validatePhone(string $phone)
    {
        if (!preg_match($this->phoneCheckPattern, $phone)) {
            throw new KonsolProException("Номер телефона {$phone} не прошел валидацию");
        }
    }
}