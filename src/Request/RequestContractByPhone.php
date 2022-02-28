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

        return [
            'phone' => implode(',', $this->phones),
            'page'  => $this->page
        ];
    }

    /**
     * Добавляем телефон в внутренний массив телефонов
     * @param string $phone
     * @return $this
     */
    public function addPhone(string $phone): RequestContractByPhone
    {
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * Валидируем телефоны
     * @throws KonsolProException
     */
    private function validatePhones()
    {
        foreach ($this->phones as $phone) {
            if (!preg_match($this->phoneCheckPattern, (string)$phone)) {
                throw new KonsolProException("Номер телефона {$phone} не прошел валидацию");
            }
        }
    }
}