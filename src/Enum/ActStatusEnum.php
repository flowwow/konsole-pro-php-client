<?php

namespace Flowwow\KonsolPro\Enum;

/**
 * Статус акта
 */
class ActStatusEnum
{
    /** создан */
    const CREATED = 'created';

    /** подписан компанией */
    const ACCEPTED_BY_COMPANY = 'accepted_by_company';

    /** подписан исполнителем */
    const ACCEPTED_BY_CONTRACTOR = 'accepted_by_contractor';

    /** подписан обеими сторонами */
    const ACCEPTED = 'accepted';

    /** аннулирован */
    const ANNULLED = 'annulled';

    /** оплачен без подписи исполнителя */
    const PAID_WITHOUT_CONTRACTOR_ACCEPT = 'paid_without_contractor_accept';

    /** оплачен */
    const PAID = 'paid';
}
