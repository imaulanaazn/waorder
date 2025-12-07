<?php

namespace App;

enum UserRole: string
{
    case ADMIN = 'admin';
    case OWNER = 'owner';
    case STAFF = 'staff';
    case CUSTOMER = 'customer';
    case SUPER_ADMIN = 'super_admin';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::OWNER => 'Owner',
            self::STAFF => 'Staff',
            self::CUSTOMER => 'Customer',
            self::SUPER_ADMIN => 'Super Admin',
        };
    }
}
