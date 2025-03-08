<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case CRM_STATUS  = 'crm_status';
    case CRM_GROUP  = 'crm_group';
    case CRM_SOURCE  = 'crm_source';
    case CRM_LEAD  = 'crm_lead';
    case CRM_CUSTOMER  = 'crm_customer';
    case CRM_TEAM  = 'crm_teams';


    public function label(): string
    {
        return match ($this) {
            static::CRM_STATUS =>   'CRM/Status',
            static::CRM_GROUP =>     'CRM/Group',
            static::CRM_SOURCE =>   'CRM/Source',
            static::CRM_LEAD =>     'CRM/Lead',
            static::CRM_CUSTOMER => 'CRM/Customer',
            static::CRM_TEAM =>    'CRM/Teams',
        };
    }
}
