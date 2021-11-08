<?php

namespace Flowwow\KonsolPro\Enum;

/**
 * Статус договора
 */
class DocumentStatusEnum
{
    /** создан */
    const CREATED = 'created';

    /** подписан компанией */
    const SIGNED_BY_COMPANY = 'signed_by_company';

    /** подписан исполнителем */
    const SIGNED_BY_COMNTRACTOR = 'signed_by_contractor';

    /** подписан обеими сторонами */
    const SIGNED_BY_ALL = 'signed_by_all';
}
