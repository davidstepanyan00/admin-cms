<?php

namespace App\Classes;

class BaseConstants
{
    public const ROLE_ADMIN = 'admin';

    public const MODULE_ADMINISTRATION = 'Администратирование';

    public const MODULE_ANALYTICS = 'Аналитика';

    public const MODULE_NOTIFICATIONS = 'Уведомления';

    public const MODULE_LiVE_TAPE = 'Живая лента';

    public const MODULE_TICKETS = 'Билеты';

    public const MODULE_APPEALS = 'Обращения';

    public const MODULE_LOCATION_ON_MAP = 'Места на карте';


    public const MODULES = [
        self::MODULE_ADMINISTRATION,
        self::MODULE_ANALYTICS,
        self::MODULE_NOTIFICATIONS,
        self::MODULE_LiVE_TAPE,
        self::MODULE_TICKETS,
        self::MODULE_APPEALS,
        self::MODULE_LOCATION_ON_MAP,
    ];
}
